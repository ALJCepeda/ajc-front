<?php

$menuList = [ 
	new Model\Menu\Item([ "name"=>"Home", "path"=>"/", "loc"=>$path ]),
	new Model\Menu\Item([ "name"=>"Eval", "path"=>"/eval", "loc"=>$path ]),
	new Model\Menu\Item([ "name"=>"Snake", "path"=>"/snake", "loc"=>$path ]),
	new Model\Menu\Item([ "name"=>"Portfolio", "path"=>"/portfolio", "loc"=>$path ]),
	new Model\Menu\Item([ "name"=>"About Me", "path"=>"/aboutme", "loc"=>$path ])
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
	<link rel="stylesheet" type="text/css" href="/assets/css/pages/index.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/pages/navbar.css">

	<?= implode("\n", $javascripts); ?>
	<?= implode("\n", $stylesheets); ?>
	<?= implode("\n", $requires); ?>
</head>

<header>
	<ul class="navigation">
		<h4>ALJCepeda</h4>
		<?php render_template("menu", [ "menuList"=>$menuList ]); ?>
	</ul>	

	<?php foreach ($notifications as $key => $notification) {
		render_template("notification", [ "m"=>$notification ]);
	}	?>
</header>

<body>
	<div class="outer-container">
		<?php render_view($script, null); ?>
	</div>
</body>

</html>