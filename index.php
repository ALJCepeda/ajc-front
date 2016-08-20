<?php
//Does all preprocessing such as providing dependencies, constants and refreshes session
require 'resources/config.php';

//Attempts to resolve request path or redirects to 404
//Provides $parameters for page
include 'resources/router/routes.php';
$routes = getRoutes();

require 'resources/router/router.php';
$parameters = getParameters($routes);

//Takes $parameters and autoloads page data
//Provides $title,stylesheet,requires,stylesheets,javascripts and script
require 'resources/router/map.php';
$map = require_map();

require 'resources/router/parametizer.php';
$params = new Parametizer($parameters, $map);

$navbarModel =[
	"menu" => [
		"Home" => "/",
		"Eval" => "/eval",
		"Snake" => "/snake",
	 	"Repair" => "/repair",
	 	"Portfolio" => "/portfolio",
	 	"About Me" => "/aboutme"
	],
	"notifications" => $params->notifications(),
	"path" => $params->path()
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="ALJCepeda">
	<title><?= $params->title() ?></title>

	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/flex.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/pages/index.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/pages/navbar.css">

	<?= implode("\n", $params->javascripts()); ?>
	<?= implode("\n", $params->stylesheets()); ?>
	<?= implode("\n", $params->requires()); ?>
</head>

<header>
	<?php render("views/navbar.php", $navbarModel); ?>
</header>

<body>
	<div class="outer-container">
		<?php render($params->location(), null) ?>
	</div>
</body>

</html>
