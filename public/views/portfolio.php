<?php
require ROOT . "/resources/models/portfolio/entries.php";

if(!isset($_SESSION['portfolio'])) {
	$_SESSION['portfolio'] = [
		"image" => "Bar",
		"question" => 1
	];
}

$entries = generate_entries();
?>

<div class="content-container">
	<div class="header">
		<h1>Portfolio</h1>
	</div>

	<div class="col-nw c-center m-center">
		<?php 	
			foreach ($entries as $key => $entry) {
				render_template("portfolio/entry", [ "model" => $entry ]);
			}	?>
	</div>
</div>