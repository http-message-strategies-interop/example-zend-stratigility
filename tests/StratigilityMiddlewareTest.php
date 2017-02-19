<?php

namespace Interop\Http\Message\Strategies\Examples\Stratigility;

use Interop\Http\Message\Strategies\ServerRequestResponseInterface;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response;

class StratigilityMiddlewareTest extends \PHPUnit\Framework\TestCase
{
    public function testStratigilityMiddlewareShouldImplementsServerRequestResponseInterface()
    {
        $this->assertInstanceOf(ServerRequestResponseInterface::class, new StratigilityMiddleware());
    }

    public function testStratigilityMiddlewareShouldSayHello()
    {
        $sut = new StratigilityMiddleware();
        $request = (new ServerRequest([], [], '/world'));
        $this->assertEquals('Hello world!', ''.$sut($request)->getBody());
    }

    public function testStratigilityMiddlewareShouldBePoweredByUnicorns()
    {
        $sut = new StratigilityMiddleware();
        $request = (new ServerRequest([], [], '/world'));
        $response = new Response();
        $this->assertEquals(['Unicorns'], $sut($request, $response)->getHeader('X-Powered-By'));
    }
}
