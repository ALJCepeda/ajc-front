<?php

include $_SERVER['DOCUMENT_ROOT'] . '/config.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();
$routes->add('mainpage', new Route('/', ['script' => 'views/mainpage.html']));
$routes->add('routetest', new Route('/user/{action}/{foo}', ['test' => 'what?']));

$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());

$matcher = new UrlMatcher($routes, $context);

$parameters = $matcher->match($context->getPathInfo());

include 'views/header.html';

if(isset($parameters['test'])){
	echo "Routing successful! You want to create a username: " . $parameters['foo'];
} else if(isset($parameters['script'])){
	include $parameters['script'];	
}

include 'views/footer.html';
?>
