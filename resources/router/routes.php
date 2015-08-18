<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

//This is being initialized here just for convenience.
//Determines what's displayed in navbar.php
$menuList = [
				'Home' => '/',
				'Snake' => '/snake',
			 	'Repair' => '/repair',
			 	'About Me' => '/aboutme',
			 	'Blog' => (!ISLOCAL) ? 'http://blog.aljcepeda.com' : '#'
			];

$routes = new RouteCollection();
$routes->add('mainpage', new Route('/'));
$routes->add('redirect', new Route('/redirect'));
$routes->add('404', new Route('/error/404', ['title' => '404 Error']));
$routes->add('repair', new Route('/repair', ['title' => 'Repair']));
$routes->add('invalidsession', new Route('/error/invalid', ['title' => 'Invalid Request', 'error' => 'badsession']));
$routes->add('aboutme', new Route('/aboutme', [ 'title' => 'About Me' ]));
$routes->add('snake', new Route('/snake', 
									[
										'title' => 'Snake.IO',
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