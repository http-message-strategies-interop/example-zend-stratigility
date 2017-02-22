<?php

namespace Interop\Http\Message\Strategies\Examples\Stratigility;

use Interop\Http\Message\Strategies\Examples\Stratigility\Helpers\ResponseFactory;
use Interop\Http\Message\Strategies\ServerRequestResponseInterface;
use Zend\Diactoros\ServerRequest;

class StratigilityMiddlewareTest extends \PHPUnit\Framework\TestCase
{
    public function testStratigilityMiddlewareShouldImplementsServerRequestResponseInterface()
    {
        $this->assertInstanceOf(
            ServerRequestResponseInterface::class,
            new StratigilityMiddleware(new ResponseFactory())
        );
    }

    public function testStratigilityMiddlewareShouldSayHello()
    {
        $sut = new StratigilityMiddleware(new ResponseFactory());
        $request = (new ServerRequest([], [], '/world'));
        $this->assertEquals('Hello world!', ''.$sut($request)->getBody());
    }

    public function testStratigilityMiddlewareShouldBePoweredByUnicorns()
    {
        $sut = new StratigilityMiddleware(new ResponseFactory());
        $request = (new ServerRequest([], [], '/world'));
        $response = (new ResponseFactory())->createResponse();
        $this->assertEquals(['Unicorns'], $sut($request, $response)->getHeader('X-Powered-By'));
    }
}
