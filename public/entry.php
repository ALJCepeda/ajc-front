<?php
$navbarModel =[
	"menu" => [
		"Home" => "/",
		"Eval" => "/eval",
		"Snake" => "/snake",
	 	"Repair" => "/repair",
	 	"Portfolio" => "/portfolio",
	 	"About Me" => "/aboutme"
	],
	"path" => $path
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Entry point of website">
	<meta name="author" content="Alfred Cepeda">
	<link rel="icon" href="/assets/images/icons/favicon.ico">
	<title><?= $title ?></title>

	<script src="/bower/jquery/dist/jquery.min.js"></script>
	<script src="/bower/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="/bower/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/flex.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/pages/index.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/pages/navbar.css">

	<?= implode("\n", $javascripts); ?>
	<?= implode("\n", $stylesheets); ?>
	<?= implode("\n", $requires); ?>
</head>

<header>
	<?php render_view("navbar", $navbarModel); ?>
</header>

<body>
	<div class="outer-container">
		<?php render_view($script, null) ?>
	</div>
</body>

</html>