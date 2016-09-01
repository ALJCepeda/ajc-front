<!DOCTYPE html>
<html lang='en'>

<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta name='author' content='ALJCepeda'>
	<title>ALJCepeda</title>

	<script type='text/javascript' src='jquery.js'></script>
	<script type='text/javascript' src='underscore.js'></script>
	<script type='text/javascript' src='knockout.js'></script>
	<script type='text/javascript' src='bootstrap.js'></script>
	<script type='text/javascript' src='bootstrap.mdl.js'></script>

	<link rel='stylesheet' type='text/css' href='bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='bootstrap.mdl.css'>

	<link rel='stylesheet' type='text/css' href='/assets/css/flex.css'>
	<link rel='stylesheet' type='text/css' href='/assets/css/index.css'>
	<script type='text/javascript' src='require.js' data-main='index' ></script>
</head>
<body>
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
			<div class='col-xs-3 menu' style='max-height:100vh'>
				<ul data-bind='foreach: menuTabs'>
					<li data-bind='text: $data.name, click:$root.clickedTab, attr: { id:"menu_" + $data.id, name:$data.name, href:$data.hash }'>
				</ul>
			</div>
			<div id='pages' class='col-xs-9 pages row-w m-center' style='height:100vh; min-height:400px; background-color:#B3E5FC'>
				<div id='pageContainer' class='col-xs-10'></div>
			</div>
		</div>
	</div>
</body>
</html>
