<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

namespace Contao;

/**
 * Provide methods to manage front end users.
 *
 * @property array   $allGroups
 * @property string  $loginPage
 *
 * @author Leo Feyer <https://github.com/leofeyer>
 */
class FrontendUser extends \User
{

	/**
	 * Current object instance (do not remove)
	 * @var FrontendUser
	 */
	protected static $objInstance;

	/**
	 * Name of the corresponding table
	 * @var string
	 */
	protected $strTable = 'tl_member';

	/**
	 * Name of the current cookie
	 * @var string
	 */
	protected $strCookie = 'FE_USER_AUTH';

	/**
	 * Group login page
	 * @var string
	 */
	protected $strLoginPage;

	/**
	 * Groups
	 * @var array
	 */
	protected $arrGroups;

	/**
	 * Initialize the object
	 */
	protected function __construct()
	{
		parent::__construct();

		$this->strIp = \Environment::get('ip');
		$this->strHash = \Input::cookie($this->strCookie);
	}

	/**
	 * Extend parent setter class and modify some parameters
	 *
	 * @param string $strKey
	 * @param mixed  $varValue
	 */
	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
			case 'allGroups':
				$this->arrGroups = $varValue;
				break;

			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}

	/**
	 * Extend parent getter class and modify some parameters
	 *
	 * @param string $strKey
	 *
	 * @return mixed
	 */
	public function __get($strKey)
	{
		switch ($strKey)
		{
			case 'allGroups':
				return $this->arrGroups;
				break;

			case 'loginPage':
				return $this->strLoginPage;
				break;
		}

		return parent::__get($strKey);
	}

	/**
	 * Authenticate a user
	 *
	 * @return boolean
	 */
	public function authenticate()
	{
		// Default authentication
		if (parent::authenticate())
		{
			return true;
		}

		// Check whether auto login is enabled
		if (\Config::get('autologin') > 0 && ($strCookie = \Input::cookie('FE_AUTO_LOGIN')))
		{
			// Try to find the user by his auto login cookie
			if ($this->findBy('autologin', hash_hmac('sha256', $strCookie, \System::getContainer()->getParameter('kernel.secret'))) !== false)
			{
				// Check the auto login period
				if ($this->createdOn >= (time() - \Config::get('autologin')))
				{
					// Validate the account status
					if ($this->checkAccountStatus() !== false)
					{
						$this->setUserFromDb();

						// Last login date
						$this->lastLogin = $this->currentLogin;
						$this->currentLogin = time();
						$this->save();

						// Generate the session
						$this->generateSession();
						$this->log('User "' . $this->username . '" was logged in automatically', __METHOD__, TL_ACCESS);

						// Reload the page
						\Controller::reload();

						return true;
					}
				}
			}

			// Remove the cookie if it is invalid to enable loading cached pages
			$this->setCookie('FE_AUTO_LOGIN', $strCookie, (time() - 86400), null, null, \Environment::get('ssl'), true);
		}

		return false;
	}

	/**
	 * Add the auto login resources
	 *
	 * @return boolean
	 */
	public function login()
	{
		// Default routine
		if (parent::login() == false)
		{
			return false;
		}

		// Set the auto login data
		if (\Config::get('autologin') > 0 && \Input::post('autologin'))
		{
			$time = time();
			$strToken = md5(uniqid(mt_rand(), true));

			$this->createdOn = $time;
			$this->autologin = hash_hmac('sha256', $strToken, \System::getContainer()->getParameter('kernel.secret'));
			$this->save();

			$this->setCookie('FE_AUTO_LOGIN', $strToken, ($time + \Config::get('autologin')), null, null, \Environment::get('ssl'), true);
		}

		return true;
	}

	/**
	 * Remove the auto login resources
	 *
	 * @return boolean
	 */
	public function logout()
	{
		// Default routine
		if (parent::logout() == false)
		{
			return false;
		}

		// Reset the auto login data
		$this->autologin = null;
		$this->createdOn = 0;
		$this->save();

		// Remove the auto login cookie
		$this->setCookie('FE_AUTO_LOGIN', $this->autologin, (time() - 86400), null, null, \Environment::get('ssl'), true);

		return true;
	}

	/**
	 * Save the original group membership
	 *
	 * @param string $strColumn
	 * @param mixed  $varValue
	 *
	 * @return boolean
	 */
	public function findBy($strColumn, $varValue)
	{
		if (parent::findBy($strColumn, $varValue) === false)
		{
			return false;
		}

		$this->arrGroups = $this->groups;

		return true;
	}

	/**
	 * Restore the original group membership
	 */
	public function save()
	{
		$groups = $this->groups;
		$this->arrData['groups'] = $this->arrGroups;
		parent::save();
		$this->groups = $groups;
	}

	/**
	 * Set all user properties from a database record
	 */
	protected function setUserFromDb()
	{
		$this->intId = $this->id;

		// Unserialize values
		foreach ($this->arrData as $k=>$v)
		{
			if (!is_numeric($v))
			{
				$this->$k = \StringUtil::deserialize($v);
			}
		}

		// Set language
		if ($this->language != '')
		{
			\System::getContainer()->get('request_stack')->getCurrentRequest()->setLocale($this->language);
			\System::getContainer()->get('translator')->setLocale($this->language);

			// Deprecated since Contao 4.0, to be removed in Contao 5.0
			$GLOBALS['TL_LANGUAGE'] = str_replace('_', '-', $this->language);
		}

		$GLOBALS['TL_USERNAME'] = $this->username;

		// Make sure that groups is an array
		if (!\is_array($this->groups))
		{
			$this->groups = ($this->groups != '') ? array($this->groups) : array();
		}

		// Skip inactive groups
		if (($objGroups = \MemberGroupModel::findAllActive()) !== null)
		{
			$this->groups = array_intersect($this->groups, $objGroups->fetchEach('id'));
		}

		// Get the group login page
		if ($this->groups[0] > 0)
		{
			$objGroup = \MemberGroupModel::findPublishedById($this->groups[0]);

			if ($objGroup !== null && $objGroup->redirect && $objGroup->jumpTo)
			{
				$this->strLoginPage = $objGroup->jumpTo;
			}
		}
	}
}
