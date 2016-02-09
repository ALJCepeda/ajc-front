<?php
require ROOT . "/resources/models/portfolio/entries.php";

$_SESSION["portfolio"] = isset($_SESSION["portfolio"]) ? $_SESSION["portfolio"] : [];
$_SESSION["portfolio"] = add_defaults($_SESSION["portfolio"], [
	"projections" => [
		"image" => "Bar",
		"question" => 0
	],
	"repair" => [
		"image" => "Broken",
		"question" => 0
	],
	"terror" => [
		"image" => "FrontUI",
		"question" => 0
	],
	"interest" => [
		"image" => "Chart",
		"question" => 0
	]
]);

$entries = generate_entries($_SESSION["portfolio"]);
?>

<div class="content-container">
	<div class="header">
		<h1>Portfolio</h1>
	</div>

	<div class="col-nw c-center m-center">
		<?php 	
			foreach ($entries as $key => $entry) {
				render_template("portfolio/entry", [ "key"=>$key, "m" => $entry ]);
			}	?>
	</div>
</div>