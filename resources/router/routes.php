<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

//This is being initialized here just for convenience.
//Determines what's displayed in navbar.php
$menuList = [
				'Home' => '/',
				'Eval' => '/eval',
				'Snake' => '/snake',
			 	'Repair' => '/repair',
			 	'About Me' => '/aboutme'
			];

$routes = new RouteCollection();
$routes->add('mainpage', new Route('/'));
$routes->add('redirect', new Route('/redirect'));
$routes->add('404', new Route('/error/404', ['title' => '404 Error', 'script' => 'views/error/404.html']));
$routes->add('invalidsession', new Route('/error/invalid', ['title' => 'Invalid Request', 'script' => 'views/error/invalidsession.php', 'error' => 'badsession']));
$routes->add('repair', new Route('/repair', ['title' => 'Repair']));
$routes->add('aboutme', new Route('/aboutme', [ 'title' => 'About Me' ]));
$routes->add('eval', new Route('/eval', 
									[ 
										'title' => 'Eval', 
										'css' => [ 'buttons', 'colors' ]
									]
								));
$routes->add('snake', new Route('/snake', 
									[
										'title' => 'Snake.IO',
										'css' => [ 'buttons', 'colors' ],
										'notification' => [
											'status' => 'Down',
											'type' => 'alert-danger',
											'dismissable' => true,
											'message' => 'Snake.IO has been taken down until I can afford a better web host'
										]
									]
								));
$routes->add('createUser', new Route('/user/create', 
									[
										'title' => 'Create User',
										'require' => ['recaptcha']
									]
								));