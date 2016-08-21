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
	<script type='text/javascript' src='bootstrap.js'></script>
	<script type='text/javascript' src='bootstrap.mdl.js'></script>

	<link rel='stylesheet' type='text/css' href='bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='bootstrap.mdl.css'>
	<link rel='stylesheet' type='text/css' href='/assets/css/flex.css'>
	<link rel='stylesheet' type='text/css' href='/assets/css/pages/index.css'>
	<link rel='stylesheet' type='text/css' href='/assets/css/pages/navbar.css'>
</head>

<header>
	<?php render('views/navbar.php', $navbarModel); ?>
</header>

<body>
	<div class='outer-container'>
		<?php render($parameters['location'], null) ?>
	</div>
</body>

</html>
