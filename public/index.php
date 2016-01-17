<?php
//Does all preprocessing such as providing dependencies, constants and refreshes session
require $_SERVER["DOCUMENT_ROOT"] . "/startsession.php";


//Attempts to resolve request path or redirects to 404
//Provides $parameters for page
require ROOT . "/resources/router/router.php";

//Takes $parameters and autoloads page data
//Provides $title,stylesheet,requires,stylesheets,javascripts and script
require ROOT . "/resources/router/map.php";
require ROOT . "/resources/router/parametizer.php";

$params = new Parametizer($parameters, require_map());

render("entry", [ 
	"title" => $params->title(),
	"script" => $params->script(),
	"javascripts" => $params->javascripts(),
	"stylesheets" => $params->stylesheets(),
	"requires" => $params->requires(),
	"path" => $context->getPathInfo()
]);