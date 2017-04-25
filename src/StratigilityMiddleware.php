<?php

namespace Interop\Http\Message\Strategies\Examples\Stratigility;

use Interop\Http\Message\Strategies\ServerActionInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;
use Zend\Stratigility\MiddlewareInterface;

class StratigilityMiddleware implements ServerActionInterface, MiddlewareInterface
{
    /**
     * Process a server request and return the produced response.
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface|null $response
     *
     * @return ResponseInterface
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response = null, callable $next = null)
    {
        if ($response === null) {
            $response = new Response();
        }

        $name = ltrim($request->getUri()->getPath(), '/');
        $response->getBody()->write("Hello $name!");

        return $response->withHeader('X-Powered-By', 'Unicorns');
    }
}
