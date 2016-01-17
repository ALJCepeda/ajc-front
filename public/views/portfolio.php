<?php

$entry = [
	"title" => "Financial Projections",
	"selectedImage" => "chart",
	"selectedQuestion" => 1,
	"images" => [
		"chart" => "projections/chart.png",
		"grouped" => "projections/grouped.png"
	],
	"questions" => [
		[ "Q" => "Is Pluto a planet?", "A" => "Yes it is not a planet" ],
		[ "Q" => "Where's Waldo?", "A" => "In space!" ]
	]
];

?>

<style type="text/css">
	.outer-container {
        display: flex;
        flex-direction:column;
        align-items: center;
        justify-content: flex-start;
    }

	.content-container {
		height: 100%;
		width:50%;
		text-align: center;
	}
</style>

<div class="content_container">
	<div class="header">
		<h1>Portfolio</h1>
	</div>

	<div style="width:75%">
		<?php render_template("portfolio_entry", $entry); ?>
	</div>
</div>