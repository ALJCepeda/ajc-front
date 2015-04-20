<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../config.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();
$routes->add('mainpage', new Route('/', array('script' => 'views/mainpage.php')));
//$routes->add('routetest', new Route('/user/{action}/{foo}', array('script' => 'bar', 'test' => 'what?')));

$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());

$matcher = new UrlMatcher($routes, $context);

$parameters = $matcher->match($context->getPathInfo());

include $parameters['script'];
?>