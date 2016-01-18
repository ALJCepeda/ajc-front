<?php
if(!isset($_SESSION['portfolio'])) {
	$_SESSION['portfolio'] = [
		"image" => "Bar",
		"question" => 1
	];
}

$entry = [
	"title" => "Financial Projections",
	"selectedImage" => $_SESSION['portfolio']['image'],
	"selectedQuestion" => intval($_SESSION['portfolio']['question']),
	"images" => [
		"Bar" => "projections/bar.png",
		"Chart" => "projections/chart.png",
		"Grouped" => "projections/grouped.png",
		"Expanded" => "projections/expanded.png",
		"Both" => "projections/expanded_grouped.png"
	],
	"questions" => [
		[ "Q" => "Is Pluto a planet?", "A" => "Yes it is not a planet" ],
		[ "Q" => "Where's Waldo?", "A" => "In space!" ],
		[ "Q" => "Is this another question?", "A" => "Yes it is" ]
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

	.header, .footer{
	  	flex: 1 auto;
	  	width: 100%;
	}
	.aside { 
		flex: 1 0 auto;
	}
	.left {
		width:65%;
	}
	.right {
		width:35%;
	}
	.portfolio_entry {
		display: flex;
	  	flex-flow: row wrap;
	  	justify-content:space-around;
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