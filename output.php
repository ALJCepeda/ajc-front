<?php
$navbarModel =[
	'menu' => [
		'Home' => '/',
		'Eval' => '/eval',
		'Snake' => '/snake',
	 	'Repair' => '/repair',
	 	'Portfolio' => '/portfolio',
	 	'About Me' => '/aboutme'
	],
	'notifications' => $parameters['notifications'] ?? [],
	'path' => $parameters['path']
];

?>

<!DOCTYPE html>
<html lang='en'>

<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta name='author' content='ALJCepeda'>
	<title><?= $parameters['title'] ?? 'ALJCepeda' ?></title>

	<script type='text/javascript' src='jquery.js'></script>
	<script type='text/javascript' src='knockout.js'></script>
	<script type='text/javascript' src='bootstrap.js'></script>
	<script type='text/javascript' src='bootstrap.mdl.js'></script>

	<link rel='stylesheet' type='text/css' href='bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='bootstrap.mdl.css'>

	<link rel='stylesheet' type='text/css' href='/assets/css/flex.css'>
	<link rel='stylesheet' type='text/css' href='/assets/css/pages/index.css'>
	<link rel='stylesheet' type='text/css' href='/assets/css/pages/navbar.css'>

	<script type='text/javascript' src='require.js' data-main='index' ></script>
</head>

<div class='header-panel shadow-z-2'>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-xs-3'>
				<h1>ALJCepeda</h1>
			</div>
		</div>
	</div>
</div>

<div id='main' class='container-fluid main'>
	<div class='row'>
		<div class='col-xs-2 menu'>
			<ul data-bind='foreach: menu'>
				<li data-bind='text: $data, click:$root.didClickMenu, attr: { id:"menu_" + $data }'>
			</ul>
		</div>
		<div class='col-xs-9 page active' style='height:400px;'>
			<div class='row'>
				<div class='col-xs-12'>
					<div class='page well active'>
						<h1>Welcome</h1>
					 	<p>To the domain of a restless mind</p>
					 	<br />
					 	<br />
					 	<p>This website is laid out using CSS3 Flexbox, new technology that has it's issues. Some things may not display correctly in Safari and Internet Explorer.

					 	<br />
					 	<br />
					 	The website has been confirmed to work on the latest Chrome and Firefox browsers.
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</html>
