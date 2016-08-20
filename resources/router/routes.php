<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

function getRoutes() {
	$routes = new RouteCollection();
	$routes->add('mainpage', new Route('/', [ 'location' => 'views/main.php']));
	$routes->add('jquery', new Route('/jquery.js', [ 'location' => 'node_modules/jquery/dist/jquery.js', 'isFile' => true]));
	$routes->add('redirect', new Route('/redirect'));
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
