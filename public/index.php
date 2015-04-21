<?php

include $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include ROOT . '/resources/security/managesession.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();
$routes->add('mainpage', new Route('/', ['script' => 'views/mainpage.html']));
$routes->add('createUser', new Route('/user/create', ['script' => 'views/user/create.html']));
$routes->add('404error', new Route('/error/404', ['script' => 'views/error/404.html']));
$routes->add('invalidSession', new Route('/error/invalid', ['script' => 'views/error/invalidsession.php', 'header' => '']));

$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());

$matcher = new UrlMatcher($routes, $context);

try{
	$parameters = $matcher->match($context->getPathInfo());	
} catch (Exception $e) {
	//Could not identify route. 404 error will be displayed
	header('HTTP/1.0 404 Not Found');
	$parameters = $matcher->match('/error/404');
}

include 'views/header.html';
echo "\n\n <!-- Begin main html --> \n\n";

include $parameters['script'];	

echo "\n\n<!-- End main html -->\n\n";
include 'views/footer.html';
?>
