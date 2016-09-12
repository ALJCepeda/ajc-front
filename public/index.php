<?php
//Does all preprocessing such as providing dependencies, constants and refreshes session
require '../resources/config.php';
$uri = $_SERVER['REQUEST_URI'];

if($uri !== '/' && $uri !== '/index.php') {
	header('Location: /#invalid');
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta name='author' content='ALJCepeda'>
	<title>ALJCepeda</title>

	<script type='text/javascript' src='/libs/jquery.min.js'></script>
	<script type='text/javascript' src='/libs/underscore-min.js'></script>
	<script type='text/javascript' src='/libs/knockout-latest.js'></script>
	<script type='text/javascript' src='/libs/bootstrap.min.js'></script>
	<script type='text/javascript' src='/libs/material.min.js'></script>
	<script type='text/javascript' src='/libs/backbone-min.js'></script>

	<link rel='stylesheet' type='text/css' href='/libs/bootstrap.min.css'>
	<link rel='stylesheet' type='text/css' href='/libs/bootstrap-material-design.min.css'>

	<link rel='stylesheet' type='text/css' href='/assets/css/flex.css'>
	<link rel='stylesheet' type='text/css' href='/assets/css/index.css'>
	<script type='text/javascript' src='/libs/require.js' data-main='/index' ></script>
</head>
<body>
	<div class='header-panel shadow-z-2'>
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-xs-3'>
					<h3>ALJCepeda</h3>
				</div>
			</div>
		</div>
	</div>

	<div id='main' class='container-fluid main'>
		<div class='row'>
			<div class='col-xs-2 menu' style='max-height:100vh'>
				<ul data-bind='foreach: menuTabs'>
					<li data-bind='text: $data.name, click:$root.clickedTab, attr: { id:"menu_" + $data.id, name:$data.name, href:$data.hash }'>
				</ul>
			</div>
			<div id='pages' class='col-xs-10 pages' style='height:100vh; min-height:400px; background-color:#B3E5FC'>
				<div id='pageContainer' class='col-xs-12 row-w m-center'></div>
			</div>
		</div>
	</div>
</body>
</html>
