<?php

//Does all preprocessing such as providing dependencies, constants and refreshes session
include $_SERVER['DOCUMENT_ROOT'] . '/startsession.php';

//Attempts to resolve request path or redirects to 404
//Provides $parameters for page
include ROOT . '/resources/routerequest.php';
 
//Location dependant javascript files
$javascripts = '';
if(isset($parameters['js'])){
	foreach ($parameters['js'] as $script) {
		$javascripts .= "<script src='$script'></script>\n";
	} 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/assets/images/icons/favicon.ico">

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-2.1.4.min.js" ></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<?=$javascripts?>

	<style type="text/css">
		html, body {
			color: #fff;
			height: 96%;
		}

		body {
  			text-shadow: 0 1px 3px rgba(0,0,0,.5);
			background: url(/assets/images/stars.jpg) no-repeat center center fixed;
			background-size: cover;
		}
		.outer-container {
			height: 100%;
			width: 100%;
			overflow-y: auto;
  			margin-left: auto;
  			margin-right: auto;

			display: flex;
			flex-direction:column;
			align-items: center;
  			justify-content: center;
		}

		.content-container {
			width:50%;
		}

	</style>
</head>

<header>
	<?php require 'views/navbar.php'; ?>
</header>
<body>
	<div class="outer-container">
		<div class="content-container">
			<?php require $parameters['script']; ?>
		</div>
	</div>
</body>

</html>
