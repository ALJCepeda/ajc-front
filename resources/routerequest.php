<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();
$routes->add('mainpage', new Route('/', ['script' => 'views/mainpage.html']));
$routes->add('redirect', new Route('/redirect', ['script' => 'views/redirect.php']));
$routes->add('404error', new Route('/error/404', ['script' => 'views/error/404.html', 'error' => '404']));
$routes->add('invalidSession', new Route('/error/invalid', ['script' => 'views/error/invalidsession.php', 'error' => 'badsession']));

$routes->add('aboutme', new Route('/aboutme', ['script' => 'views/aboutme.html']));
$routes->add('repair', new Route('/repair', ['script' => 'views/repair.html']));
$routes->add('snake', new Route('/snake', [ 'script' => 'views/snake.php',
											'js' => ['https://code.jquery.com/jquery-2.1.4.min.js'],
											'notification' => [ 'status' => 'Active Development',
										 					 'type' => 'alert-warning',
										 					 'dismissable' => true,
										 					 'message' => 'Snake.IO will be undergoing updates weekly']]));
$routes->add('chat', new Route('/chat', ['script' => 'views/chat.php',
										 'notification' => [ 'status' => 'Development Postponed',
										 					 'type' => 'alert-danger',
										 					 'dismissable' => true,
										 					 'message' => 'Releases for this app will be delayed in favor of Snake.IO']]));
$routes->add('createUser', new Route('/user/create', ['script' => 'views/user/create.html', 
													  'js' => [ 'https://www.google.com/recaptcha/api.js' ], 
													  'notification' => ['status' => 'Registration Unavailable', 
													  					 'type' => 'alert-warning',
													  					 'dismissable' => true,
													  					 'message' => 'Pressing submit will redirect you home']]));

$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());

$matcher = new UrlMatcher($routes, $context);

try{
	$parameters = $matcher->match($context->getPathInfo());	
} catch (Exception $e) {
	//Could not identify route. 404 error will be displayed
	header('HTTP/2.0 404 Not Found');
	$parameters = $matcher->match('/error/404');
}

?>