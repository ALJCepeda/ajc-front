<?php
var_dump($_SESSION);

if(!isset($_SESSION['portfolio'])) {
	$_SESSION['portfolio'] = [
		"image" => "chart",
		"question" => 1
	];
}

$entry = [
	"title" => "Financial Projections",
	"selectedImage" => $_SESSION['portfolio']['image'],
	"selectedQuestion" => $_SESSION['portfolio']['question'],
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
		width:80%;
		text-align: center;
	}
</style>

<div class="content-container">
	<div class="header">
		<h1>Portfolio</h1>
	</div>

	<div class="col-nw c-center m-center">
		<?php render_template("portfolio_entry", $entry); ?>
	</div>
</div>