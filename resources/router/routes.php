<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

//This is being initialized here just for convenience.
//Determines what's displayed in navbar.php
$menuList = [
				'Home' => '/',
				'Snake' => '/snake',
			 	'Repair' => '/repair',
			 	'Tools' => [
			 		'Radomizer' => '/radomizer'
			 	],
			 	'About Me' => '/aboutme',
			 	'Blog' => (!ISLOCAL) ? 'http://blog.aljcepeda.com' : '#'
			];

$routes = new RouteCollection();
$routes->add('mainpage', new Route('/'));
$routes->add('redirect', new Route('/redirect'));
$routes->add('404', new Route('/error/404', ['title' => '404 Error', 'script' => 'views/error/404.html']));
$routes->add('invalidsession', new Route('/error/invalid', ['title' => 'Invalid Request', 'script' => 'views/error/invalidsession.php', 'error' => 'badsession']));
$routes->add('repair', new Route('/repair', ['title' => 'Repair']));
$routes->add('aboutme', new Route('/aboutme', [ 'title' => 'About Me' ]));
$routes->add('snake', new Route('/snake', 
									[
										'title' => 'Snake.IO',
										'css' => [ 'buttons', 'colors' ],
										'notification' => 
											[ 
												'status' => 'Active Development',
									 			'type' => 'alert-warning',
									 			'dismissable' => true,
									 			'message' => 'Snake.IO will be undergoing updates weekly'
									 		]
									]
								));
$routes->add('createUser', new Route('/user/create', 
									[
										'title' => 'Create User',
										'require' => ['recaptcha'],
										'notification' => 
											[
												'status' => 'Registration Unavailable', 
										  		'type' => 'alert-warning',
										  		'dismissable' => true,
										  		'message' => 'Pressing submit will redirect you home'
										  	]
									]
								));