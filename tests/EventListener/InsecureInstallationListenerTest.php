<?php

declare(strict_types=1);

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

namespace Contao\CoreBundle\Tests\EventListener;

use Contao\CoreBundle\EventListener\InsecureInstallationListener;
use Contao\CoreBundle\Exception\InsecureInstallationException;
use Contao\CoreBundle\Tests\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class InsecureInstallationListenerTest extends TestCase
{
    public function testThrowsAnExceptionIfTheDocumentRootIsInsecure(): void
    {
        $listener = new InsecureInstallationListener();

        $this->expectException(InsecureInstallationException::class);

        $listener->onKernelRequest($this->getResponseEvent($this->getRequest()));
    }

    public function testDoesNotThrowAnExceptionIfTheDocumentRootIsSecure(): void
    {
        $request = $this->getRequest();
        $request->server->set('REQUEST_URI', '/index.php?do=test');
        $request->server->set('SCRIPT_FILENAME', $this->getTempDir().'/index.php');

        $listener = new InsecureInstallationListener();
        $listener->onKernelRequest($this->getResponseEvent($request));

        $this->addToAssertionCount(1);  // does not throw an exception
    }

    public function testDoesNotThrowAnExceptionOnLocalhost(): void
    {
        $request = $this->getRequest();
        $request->server->set('REMOTE_ADDR', '127.0.0.1');

        $listener = new InsecureInstallationListener();
        $listener->onKernelRequest($this->getResponseEvent($request));

        $this->addToAssertionCount(1);  // does not throw an exception
    }

    private function getRequest(): Request
    {
        $request = new Request();
        $request->server->set('SCRIPT_NAME', 'index.php');
        $request->server->set('SCRIPT_FILENAME', $this->getTempDir().'/web/index.php');
        $request->server->set('REMOTE_ADDR', '123.456.789.0');
        $request->server->set('REQUEST_URI', '/web/index.php?do=test');

        return $request;
    }

    private function getResponseEvent(Request $request = null): RequestEvent
    {
        $kernel = $this->createMock(KernelInterface::class);

        if (null === $request) {
            $request = new Request();
        }

        return new RequestEvent($kernel, $request, HttpKernelInterface::MASTER_REQUEST);
    }
}
