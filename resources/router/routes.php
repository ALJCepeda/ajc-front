<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

function getRoutes() {
	$routes = new RouteCollection();

	$routes->add('mainpage',
		new Route('/', [
			'location' => 'views/main.php'
		]));

	$routes->add('jquery.js',
		new Route('/jquery.js', [
			'location' => 'node_modules/jquery/dist/jquery.min.js',
			'Content-Type' => 'text/javascript'
		]));

	$routes->add('bootstrap.js',
		new Route('/bootstrap.js', [
			'location' => 'node_modules/bootstrap/dist/js/bootstrap.min.js',
			'Content-Type' => 'text/javascript'
		]));

	$routes->add('bootstrap.mdl.js',
		new Route('/bootstrap.mdl.js', [
			'location' => 'node_modules/bootstrap-material-design/dist/js/material.min.js',
			'Content-Type' => 'text/javascript'
		]));

	$routes->add('bootstrap.css',
		new Route('/bootstrap.css', [
			'location' => 'node_modules/bootstrap/dist/css/bootstrap.min.css',
			'Content-Type' => 'text/css'
		]));

	$routes->add('bootstrap.mdl.css',
		new Route('/bootstrap.mdl.css', [
			'location' => 'node_modules/bootstrap-material-design/dist/css/bootstrap-material-design.min.css',
			'Content-Type' => 'text/css'
		]));

	$routes->add('redirect',
		new Route('/redirect'));
	$routes->add('404', new Route('/error/404', ['title' => '404 Error', 'script' => 'error/404']));
	$routes->add('invalidsession', new Route('/error/invalid', ['title' => 'Invalid Request', 'script' => 'error/invalidsession', 'error' => 'badsession']));
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
											'notifications' => [
												[
													'status' => 'Down',
													'type' => 'alert-danger',
													'dismissable' => true,
													'message' => 'Snake.IO has been taken down until I can afford a better web host'
												]
											]
										]
									));
	$routes->add('portfolio', new Route('/portfolio',
										[
											'title' => 'Portfolio',
											'css' => [ 'colors' ],
											'notifications' => [
												[
													'status' => 'Under Construction',
													'type' => 'alert-warning',
													'dismissable' => true,
													'message' => 'Currently under active development and will undergo regular updates througout the week... check back!'
												]
											]
										]
									));
	$routes->add('createUser', new Route('/user/create',
										[
											'title' => 'Create User',
											'require' => ['recaptcha']
										]
									));
	return $routes;
}
