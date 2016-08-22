<?php
//Does all preprocessing such as providing dependencies, constants and refreshes session
require '../resources/config.php';

//Attempts to resolve request path or redirects to 404
//Provides $parameters for page
include '../resources/router/routes.php';
$routes = getRoutes();

require '../resources/router/router.php';
$parameters = getParameters($routes);

if(isset($parameters['Content-Type']) === true) {
	header('Content-Type: ' . $parameters['Content-Type']);
	readfile('../' . $parameters['location']);
} else {
	include '../output.php';
}
