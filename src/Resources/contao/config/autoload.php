<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5.3
 * @copyright  Leo Feyer 2005-2012
 * @author     Leo Feyer <http://www.contao.org>
 * @package    Core
 * @license    LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Contao\\Ajax'               => 'system/modules/core/classes/Ajax.php',
	'Contao\\Automator'          => 'system/modules/core/classes/Automator.php',
	'Contao\\Backend'            => 'system/modules/core/classes/Backend.php',
	'Contao\\BackendModule'      => 'system/modules/core/classes/BackendModule.php',
	'Contao\\BackendTemplate'    => 'system/modules/core/classes/BackendTemplate.php',
	'Contao\\BackendUser'        => 'system/modules/core/classes/BackendUser.php',
	'Contao\\DataContainer'      => 'system/modules/core/classes/DataContainer.php',
	'Contao\\FileUpload'         => 'system/modules/core/classes/FileUpload.php',
	'Contao\\Frontend'           => 'system/modules/core/classes/Frontend.php',
	'Contao\\FrontendTemplate'   => 'system/modules/core/classes/FrontendTemplate.php',
	'Contao\\FrontendUser'       => 'system/modules/core/classes/FrontendUser.php',
	'Contao\\Hybrid'             => 'system/modules/core/classes/Hybrid.php',
	'Contao\\LiveUpdate'         => 'system/modules/core/classes/LiveUpdate.php',
	'Contao\\Message'            => 'system/modules/core/classes/Message.php',
	'Contao\\Pagination'         => 'system/modules/core/classes/Pagination.php',
	'Contao\\PurgeData'          => 'system/modules/core/classes/PurgeData.php',
	'Contao\\RebuildIndex'       => 'system/modules/core/classes/RebuildIndex.php',
	'Contao\\StyleSheets'        => 'system/modules/core/classes/StyleSheets.php',
	'Contao\\Theme'              => 'system/modules/core/classes/Theme.php',

	// Drivers
	'Contao\\DC_File'            => 'system/modules/core/drivers/DC_File.php',
	'Contao\\DC_Folder'          => 'system/modules/core/drivers/DC_Folder.php',
	'Contao\\DC_Table'           => 'system/modules/core/drivers/DC_Table.php',

	// Elements
	'Contao\\ContentAccordion'   => 'system/modules/core/elements/ContentAccordion.php',
	'Contao\\ContentAlias'       => 'system/modules/core/elements/ContentAlias.php',
	'Contao\\ContentArticle'     => 'system/modules/core/elements/ContentArticle.php',
	'Contao\\ContentCode'        => 'system/modules/core/elements/ContentCode.php',
	'Contao\\ContentDownload'    => 'system/modules/core/elements/ContentDownload.php',
	'Contao\\ContentDownloads'   => 'system/modules/core/elements/ContentDownloads.php',
	'Contao\\ContentElement'     => 'system/modules/core/elements/ContentElement.php',
	'Contao\\ContentGallery'     => 'system/modules/core/elements/ContentGallery.php',
	'Contao\\ContentHeadline'    => 'system/modules/core/elements/ContentHeadline.php',
	'Contao\\ContentHtml'        => 'system/modules/core/elements/ContentHtml.php',
	'Contao\\ContentHyperlink'   => 'system/modules/core/elements/ContentHyperlink.php',
	'Contao\\ContentImage'       => 'system/modules/core/elements/ContentImage.php',
	'Contao\\ContentList'        => 'system/modules/core/elements/ContentList.php',
	'Contao\\ContentModule'      => 'system/modules/core/elements/ContentModule.php',
	'Contao\\ContentTable'       => 'system/modules/core/elements/ContentTable.php',
	'Contao\\ContentTeaser'      => 'system/modules/core/elements/ContentTeaser.php',
	'Contao\\ContentText'        => 'system/modules/core/elements/ContentText.php',
	'Contao\\ContentToplink'     => 'system/modules/core/elements/ContentToplink.php',

	// Forms
	'Contao\\Form'               => 'system/modules/core/forms/Form.php',
	'Contao\\FormCaptcha'        => 'system/modules/core/forms/FormCaptcha.php',
	'Contao\\FormCheckBox'       => 'system/modules/core/forms/FormCheckBox.php',
	'Contao\\FormExplanation'    => 'system/modules/core/forms/FormExplanation.php',
	'Contao\\FormFieldset'       => 'system/modules/core/forms/FormFieldset.php',
	'Contao\\FormFileUpload'     => 'system/modules/core/forms/FormFileUpload.php',
	'Contao\\FormHeadline'       => 'system/modules/core/forms/FormHeadline.php',
	'Contao\\FormHidden'         => 'system/modules/core/forms/FormHidden.php',
	'Contao\\FormHtml'           => 'system/modules/core/forms/FormHtml.php',
	'Contao\\FormPassword'       => 'system/modules/core/forms/FormPassword.php',
	'Contao\\FormRadioButton'    => 'system/modules/core/forms/FormRadioButton.php',
	'Contao\\FormSelectMenu'     => 'system/modules/core/forms/FormSelectMenu.php',
	'Contao\\FormSubmit'         => 'system/modules/core/forms/FormSubmit.php',
	'Contao\\FormTextArea'       => 'system/modules/core/forms/FormTextArea.php',
	'Contao\\FormTextField'      => 'system/modules/core/forms/FormTextField.php',

	// Models
	'Contao\\ArticleModel'       => 'system/modules/core/models/ArticleModel.php',
	'Contao\\ContentModel'       => 'system/modules/core/models/ContentModel.php',
	'Contao\\FilesModel'         => 'system/modules/core/models/FilesModel.php',
	'Contao\\FormFieldModel'     => 'system/modules/core/models/FormFieldModel.php',
	'Contao\\FormModel'          => 'system/modules/core/models/FormModel.php',
	'Contao\\LayoutModel'        => 'system/modules/core/models/LayoutModel.php',
	'Contao\\MemberGroupModel'   => 'system/modules/core/models/MemberGroupModel.php',
	'Contao\\MemberModel'        => 'system/modules/core/models/MemberModel.php',
	'Contao\\ModuleModel'        => 'system/modules/core/models/ModuleModel.php',
	'Contao\\PageModel'          => 'system/modules/core/models/PageModel.php',
	'Contao\\SessionModel'       => 'system/modules/core/models/SessionModel.php',
	'Contao\\StyleModel'         => 'system/modules/core/models/StyleModel.php',
	'Contao\\StyleSheetModel'    => 'system/modules/core/models/StyleSheetModel.php',
	'Contao\\ThemeModel'         => 'system/modules/core/models/ThemeModel.php',
	'Contao\\UserModel'          => 'system/modules/core/models/UserModel.php',

	// Modules
	'Contao\\Module'             => 'system/modules/core/modules/Module.php',
	'Contao\\ModuleArticle'      => 'system/modules/core/modules/ModuleArticle.php',
	'Contao\\ModuleArticleList'  => 'system/modules/core/modules/ModuleArticleList.php',
	'Contao\\ModuleArticlenav'   => 'system/modules/core/modules/ModuleArticlenav.php',
	'Contao\\ModuleBooknav'      => 'system/modules/core/modules/ModuleBooknav.php',
	'Contao\\ModuleBreadcrumb'   => 'system/modules/core/modules/ModuleBreadcrumb.php',
	'Contao\\ModuleCloseAccount' => 'system/modules/core/modules/ModuleCloseAccount.php',
	'Contao\\ModuleCustomnav'    => 'system/modules/core/modules/ModuleCustomnav.php',
	'Contao\\ModuleFlash'        => 'system/modules/core/modules/ModuleFlash.php',
	'Contao\\ModuleHtml'         => 'system/modules/core/modules/ModuleHtml.php',
	'Contao\\ModuleLogin'        => 'system/modules/core/modules/ModuleLogin.php',
	'Contao\\ModuleLogout'       => 'system/modules/core/modules/ModuleLogout.php',
	'Contao\\ModuleMaintenance'  => 'system/modules/core/modules/ModuleMaintenance.php',
	'Contao\\ModuleNavigation'   => 'system/modules/core/modules/ModuleNavigation.php',
	'Contao\\ModulePassword'     => 'system/modules/core/modules/ModulePassword.php',
	'Contao\\ModulePersonalData' => 'system/modules/core/modules/ModulePersonalData.php',
	'Contao\\ModuleQuicklink'    => 'system/modules/core/modules/ModuleQuicklink.php',
	'Contao\\ModuleQuicknav'     => 'system/modules/core/modules/ModuleQuicknav.php',
	'Contao\\ModuleRandomImage'  => 'system/modules/core/modules/ModuleRandomImage.php',
	'Contao\\ModuleRegistration' => 'system/modules/core/modules/ModuleRegistration.php',
	'Contao\\ModuleRssReader'    => 'system/modules/core/modules/ModuleRssReader.php',
	'Contao\\ModuleSearch'       => 'system/modules/core/modules/ModuleSearch.php',
	'Contao\\ModuleSitemap'      => 'system/modules/core/modules/ModuleSitemap.php',
	'Contao\\ModuleUser'         => 'system/modules/core/modules/ModuleUser.php',

	// Pages
	'Contao\\PageError403'       => 'system/modules/core/pages/PageError403.php',
	'Contao\\PageError404'       => 'system/modules/core/pages/PageError404.php',
	'Contao\\PageForward'        => 'system/modules/core/pages/PageForward.php',
	'Contao\\PageRedirect'       => 'system/modules/core/pages/PageRedirect.php',
	'Contao\\PageRegular'        => 'system/modules/core/pages/PageRegular.php',
	'Contao\\PageRoot'           => 'system/modules/core/pages/PageRoot.php',

	// Widgets
	'Contao\\CheckBox'           => 'system/modules/core/widgets/CheckBox.php',
	'Contao\\CheckBoxWizard'     => 'system/modules/core/widgets/CheckBoxWizard.php',
	'Contao\\ChmodTable'         => 'system/modules/core/widgets/ChmodTable.php',
	'Contao\\FileSelector'       => 'system/modules/core/widgets/FileSelector.php',
	'Contao\\FileTree'           => 'system/modules/core/widgets/FileTree.php',
	'Contao\\ImageSize'          => 'system/modules/core/widgets/ImageSize.php',
	'Contao\\InputUnit'          => 'system/modules/core/widgets/InputUnit.php',
	'Contao\\KeyValueWizard'     => 'system/modules/core/widgets/KeyValueWizard.php',
	'Contao\\ListWizard'         => 'system/modules/core/widgets/ListWizard.php',
	'Contao\\MetaWizard'         => 'system/modules/core/widgets/MetaWizard.php',
	'Contao\\ModuleWizard'       => 'system/modules/core/widgets/ModuleWizard.php',
	'Contao\\OptionWizard'       => 'system/modules/core/widgets/OptionWizard.php',
	'Contao\\PageSelector'       => 'system/modules/core/widgets/PageSelector.php',
	'Contao\\PageTree'           => 'system/modules/core/widgets/PageTree.php',
	'Contao\\Password'           => 'system/modules/core/widgets/Password.php',
	'Contao\\RadioButton'        => 'system/modules/core/widgets/RadioButton.php',
	'Contao\\RadioTable'         => 'system/modules/core/widgets/RadioTable.php',
	'Contao\\SelectMenu'         => 'system/modules/core/widgets/SelectMenu.php',
	'Contao\\TableWizard'        => 'system/modules/core/widgets/TableWizard.php',
	'Contao\\TextArea'           => 'system/modules/core/widgets/TextArea.php',
	'Contao\\TextField'          => 'system/modules/core/widgets/TextField.php',
	'Contao\\TextStore'          => 'system/modules/core/widgets/TextStore.php',
	'Contao\\TimePeriod'         => 'system/modules/core/widgets/TimePeriod.php',
	'Contao\\TrblField'          => 'system/modules/core/widgets/TrblField.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'analytics_google'    => 'system/modules/core/templates',
	'analytics_piwik'     => 'system/modules/core/templates',
	'be_changelog'        => 'system/modules/core/templates',
	'be_confirm'          => 'system/modules/core/templates',
	'be_diff'             => 'system/modules/core/templates',
	'be_error'            => 'system/modules/core/templates',
	'be_files'            => 'system/modules/core/templates',
	'be_help'             => 'system/modules/core/templates',
	'be_install'          => 'system/modules/core/templates',
	'be_live_update'      => 'system/modules/core/templates',
	'be_login'            => 'system/modules/core/templates',
	'be_main'             => 'system/modules/core/templates',
	'be_maintenance'      => 'system/modules/core/templates',
	'be_navigation'       => 'system/modules/core/templates',
	'be_password'         => 'system/modules/core/templates',
	'be_picker'           => 'system/modules/core/templates',
	'be_popup'            => 'system/modules/core/templates',
	'be_preview'          => 'system/modules/core/templates',
	'be_purge_data'       => 'system/modules/core/templates',
	'be_rebuild_index'    => 'system/modules/core/templates',
	'be_referer'          => 'system/modules/core/templates',
	'be_switch'           => 'system/modules/core/templates',
	'be_welcome'          => 'system/modules/core/templates',
	'be_widget'           => 'system/modules/core/templates',
	'be_widget_chk'       => 'system/modules/core/templates',
	'be_widget_pw'        => 'system/modules/core/templates',
	'be_widget_rdo'       => 'system/modules/core/templates',
	'be_wildcard'         => 'system/modules/core/templates',
	'ce_accordion'        => 'system/modules/core/templates',
	'ce_accordion_start'  => 'system/modules/core/templates',
	'ce_accordion_stop'   => 'system/modules/core/templates',
	'ce_code'             => 'system/modules/core/templates',
	'ce_download'         => 'system/modules/core/templates',
	'ce_downloads'        => 'system/modules/core/templates',
	'ce_gallery'          => 'system/modules/core/templates',
	'ce_headline'         => 'system/modules/core/templates',
	'ce_html'             => 'system/modules/core/templates',
	'ce_hyperlink'        => 'system/modules/core/templates',
	'ce_hyperlink_image'  => 'system/modules/core/templates',
	'ce_image'            => 'system/modules/core/templates',
	'ce_list'             => 'system/modules/core/templates',
	'ce_table'            => 'system/modules/core/templates',
	'ce_teaser'           => 'system/modules/core/templates',
	'ce_text'             => 'system/modules/core/templates',
	'ce_toplink'          => 'system/modules/core/templates',
	'fe_page'             => 'system/modules/core/templates',
	'form'                => 'system/modules/core/templates',
	'form_captcha'        => 'system/modules/core/templates',
	'form_checkbox'       => 'system/modules/core/templates',
	'form_explanation'    => 'system/modules/core/templates',
	'form_headline'       => 'system/modules/core/templates',
	'form_hidden'         => 'system/modules/core/templates',
	'form_html'           => 'system/modules/core/templates',
	'form_message'        => 'system/modules/core/templates',
	'form_password'       => 'system/modules/core/templates',
	'form_radio'          => 'system/modules/core/templates',
	'form_submit'         => 'system/modules/core/templates',
	'form_widget'         => 'system/modules/core/templates',
	'form_xml'            => 'system/modules/core/templates',
	'gallery_default'     => 'system/modules/core/templates',
	'j_accordion'         => 'system/modules/core/templates',
	'j_colorbox'          => 'system/modules/core/templates',
	'mail_default'        => 'system/modules/core/templates',
	'member_default'      => 'system/modules/core/templates',
	'member_grouped'      => 'system/modules/core/templates',
	'mod_article'         => 'system/modules/core/templates',
	'mod_article_list'    => 'system/modules/core/templates',
	'mod_article_nav'     => 'system/modules/core/templates',
	'mod_article_plain'   => 'system/modules/core/templates',
	'mod_article_teaser'  => 'system/modules/core/templates',
	'mod_booknav'         => 'system/modules/core/templates',
	'mod_breadcrumb'      => 'system/modules/core/templates',
	'mod_flash'           => 'system/modules/core/templates',
	'mod_html'            => 'system/modules/core/templates',
	'mod_login_1cl'       => 'system/modules/core/templates',
	'mod_login_2cl'       => 'system/modules/core/templates',
	'mod_logout_1cl'      => 'system/modules/core/templates',
	'mod_logout_2cl'      => 'system/modules/core/templates',
	'mod_message'         => 'system/modules/core/templates',
	'mod_navigation'      => 'system/modules/core/templates',
	'mod_password'        => 'system/modules/core/templates',
	'mod_quicklink'       => 'system/modules/core/templates',
	'mod_quicknav'        => 'system/modules/core/templates',
	'mod_random_image'    => 'system/modules/core/templates',
	'mod_search'          => 'system/modules/core/templates',
	'mod_search_advanced' => 'system/modules/core/templates',
	'mod_search_simple'   => 'system/modules/core/templates',
	'mod_sitemap'         => 'system/modules/core/templates',
	'moo_accordion'       => 'system/modules/core/templates',
	'moo_chosen'          => 'system/modules/core/templates',
	'moo_mediabox'        => 'system/modules/core/templates',
	'moo_slimbox'         => 'system/modules/core/templates',
	'nav_default'         => 'system/modules/core/templates',
	'pagination'          => 'system/modules/core/templates',
	'rss_default'         => 'system/modules/core/templates',
	'rss_items_only'      => 'system/modules/core/templates',
	'search_default'      => 'system/modules/core/templates',
));
