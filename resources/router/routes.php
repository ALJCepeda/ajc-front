<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

function getRoutes() {
	$routes = new RouteCollection();

	$routes->add('mainpage',
		new Route('/', [
			'location' => 'views/main.php'
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
	$routes->add('require.js',
		new Route('/require.js', [
			'location' => 'node_modules/requirejs/require.js',
			'Content-Type' => 'application/javascript'
		]));
	$routes->add('knockout.js',
		new Route('/knockout.js', [
			'location' => 'node_modules/knockout/build/output/knockout-latest.js',
			'Content-Type' => 'application/javascript'
		]));
	$routes->add('backbone.js',
		new Route('/backbone.js', [
			'location' => 'node_modules/backbone/backbone-min.js',
			'Content-Type' => 'application/javascript'
		]));
	$routes->add('underscore.js',
		new Route('/underscore.js', [
			'location' => 'node_modules/underscore/underscore-min.js',
			'Content-Type' => 'application/javascript'
		]));
	$routes->add('skrollr.js',
		new Route('/skrollr.js', [
			'location' => 'node_modules/skrollr/dist/skrollr.min.js',
			'Content-Type' => 'application/javascript'
		]));
	$routes->add('particles.js',
		new Route('/particles.js', [
			'location' => 'node_modules/particles.js/particles.js',
			'Content-Type' => 'application/javascript'
		]));
	$routes->add('bareutil.ajax',
		new Route('/bareutil.ajax.js', [
			'location' => 'node_modules/bareutil/scripts/ajax.js',
			'Content-Type' => 'application/javascript'
		]));
	$routes->add('bluebird',
		new Route('/bluebird.js', [
			'location' => 'node_modules/bluebird/js/browser/bluebird.min.js',
			'Content-Type' => 'application/javascript'
		]));
	$routes->add('jquery.js',
		new Route('/jquery.js', [
			'location' => 'node_modules/jquery/dist/jquery.min.js',
			'Content-Type' => 'application/javascript'
		]));
	$routes->add('bootstrap.js',
		new Route('/bootstrap.js', [
			'location' => 'node_modules/bootstrap/dist/js/bootstrap.min.js',
			'Content-Type' => 'application/javascript'
		]));
	$routes->add('bootstrap.mdl.js',
		new Route('/bootstrap.mdl.js', [
			'location' => 'node_modules/bootstrap-material-design/dist/js/material.min.js',
			'Content-Type' => 'application/javascript'
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

	return $routes;
}
