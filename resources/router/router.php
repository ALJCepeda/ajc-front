<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

include ROOT . '/resources/router/routes.php';

$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

try{
	$parameters = $matcher->match($context->getPathInfo());	
} catch (Exception $e) {
	//Could not identify route. 404 error will be displayed
	header('HTTP/2.0 404 Not Found');
	$parameters = $matcher->match('/error/404');
}