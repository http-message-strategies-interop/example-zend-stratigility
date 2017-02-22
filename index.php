<?php

namespace Interop\Http\Message\Strategies\Examples\Stratigility;

use Interop\Http\Message\Strategies\Examples\Stratigility\Helpers\ResponseFactory;
use Zend\Diactoros\Response;
use Zend\Diactoros\Server;
use Zend\Stratigility\MiddlewarePipe;
use Zend\Stratigility\NoopFinalHandler;
use Zend\Stratigility\Middleware\CallableMiddlewareWrapperFactory;

require_once 'vendor/autoload.php';
require_once 'tests/Helpers/ResponseFactory.php';

$app = new MiddlewarePipe();
$app->setCallableMiddlewareDecorator(new CallableMiddlewareWrapperFactory(new Response()));

$app->pipe('/hello/', new StratigilityMiddleware(new ResponseFactory()));

Server::createServer(
    $app,
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
)->listen(new NoopFinalHandler());
