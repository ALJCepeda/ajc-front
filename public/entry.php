<?php

$test = new Model\Menu\Item([ "name"=>"Test", "path"=>"/test" ]);
$test->addMenu(new Model\Menu\Item(["name"=>"Foo", "path"=>"/Bar"]));
$menuList = [ 
	new Model\Menu\Item([ "name"=>"Home", "path"=>"/"]),
	new Model\Menu\Item([ "name"=>"Eval", "path"=>"/eval"]),
	new Model\Menu\Item([ "name"=>"Snake", "path"=>"/snake"]),
	new Model\Menu\Item([ "name"=>"GTK", "path"=>"/goodtoknow"]),
	new Model\Menu\Item([ "name"=>"Portfolio", "path"=>"/portfolio"]),
	new Model\Menu\Item([ "name"=>"About Me", "path"=>"/aboutme"]),
	$test
];

if(isset($_SESSION['notification'])) {
	//A notification was set from the previous page
	$notifications[] = new Model\Other\Notification($_SESSION['notification']);
	unset($_SESSION['notification']);
}
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
	<link rel="stylesheet" type="text/css" href="/assets/css/display.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/pages/index.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/pages/navbar.css">

	<?= implode("\n", $javascripts); ?>
	<?= implode("\n", $stylesheets); ?>
	<?= implode("\n", $requires); ?>
</head>

<header>
	<ul class="navigation">
		<h4>ALJCepeda</h4>
		<?php render_template("menu", [ "menuList"=>$menuList, "path"=>$path ]); ?>
	</ul>	
</header>

<body>
<div class="body">
	<?php foreach ($notifications as $key => $notification) {
		render_template("notification", [ "m"=>$notification ]);
	}	?>

	<div class="outer-container">
		<?php render_view($script, null); ?>
	</div>
</div>
</body>

</html>