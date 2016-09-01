<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

function getParameters($routes) {
	$request = Request::createFromGlobals();
	$context = new RequestContext();
	$context->fromRequest($request);

	$matcher = new UrlMatcher($routes, $context);
	$parameters = $matcher->match($context->getPathInfo());
	$parameters['path'] = $context->getPathInfo();
	return $parameters;
}
