<?php

//Does all preprocessing such as providing dependencies, constants and refreshes session
require $_SERVER['DOCUMENT_ROOT'] . '/startsession.php';

//Attempts to resolve request path or redirects to 404
//Provides $parameters for page
require ROOT . '/resources/router/router.php';

//Takes $parameters and autloads page data
require ROOT . '/resources/router/loadroute.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta name='description' content='Entry point of website'>
	<meta name='author' content='Alfred Cepeda'>
	<link rel='icon' href='/assets/images/icons/favicon.ico'>
	<title><?=$title?></title>

	<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
	<link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
	
	<?=$stylesheet?>
	<?=$externals?>
	<?=$stylesheets?>
	<?=$javascripts?>

	<link rel='stylesheet' type='text/css' href='assets/css/pages/index.css'>
	<link rel='stylesheet' type='text/css' href='assets/css/pages/navbar.css'>
</head>

<header>
	<?php require 'views/navbar.php'; ?>
</header>
<body>
	<div class='outer-container'>
		<div class='content-container'>
			<?php require $script; ?>
		</div>
	</div>
</body>

</html>