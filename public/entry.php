<?php
$projects = new Model\Menu\Item([ "name"=>"Projects", "submenu" => [
		"Eval"=>"/eval",
		"Snake"=>"/snake"
	] 
]);

$notes = new Model\Menu\Item([ "name"=>"Notes", "submenu" => [
		"GTK"=>"/goodtoknow"
	]
]);

$aboutme = new Model\Menu\Item([ "name"=>"About Me", "submenu" => [
		"Portfolio"=>"/portfolio",
		"GitHub"=>"https://github.com/ALJCepeda",
		"Mission"=>"/aboutme"
	]
]);

$menuList = [ 
	$projects,
	$notes,
	$aboutme
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
		<a href="/">
			<h4 class="default-font">ALJCepeda</h4>
		</a>
		<?php render_template("menu", [ "menuList"=>$menuList, "path"=>$path ]); ?>
	</ul>	
</header>

<body>
	<div class="col-nw m-center c-center wide tall" style="overflow-y:auto">
		<?php foreach ($notifications as $key => $notification) {
			render_template("notification", [ "m"=>$notification ]);
		}	?>

		<?php render_view($script, null); ?>
	</div>
</body>

</html>