<?php
require ROOT . "/resources/models/portfolio/entries.php";

$entries = generate_entries();
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