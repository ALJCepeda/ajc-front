<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

function getParameters($routes) {
	$request = Request::createFromGlobals();
	$context = new RequestContext();
	$context->fromRequest($request);

	$matcher = new UrlMatcher($routes, $context);
	try {
		$parameters = $matcher->match($context->getPathInfo());
		$parameters['path'] = $context->getPathInfo();
		return $parameters;
	} catch (Exception $e) {
		//Could not identify route. 404 error will be displayed
		header('HTTP/2.0 404 Not Found');
		echo 'Not found';
		die();
		//$parameters = $matcher->match('/error/404');
		//return $parameters;
	}
}
