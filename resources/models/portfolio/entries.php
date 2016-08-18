<?php
function generate_entries() {
	$projections = new Model\Portfolio\Entry("Financial Projections");

	$projections->addImage("Bar", "projections/bar.png");
	$projections->addImage("Chart", "projections/chart.png");
	$projections->addImage("Grouped", "projections/grouped.png");
	$projections->addImage("Expanded", "projections/expanded.png");
	$projections->addImage("Both", "projections/expanded_grouped.png");

	$projections->addQuestion("What am I looking at?", "On the left side is a panel which allows you to control how (and which) calculations are done. The projections follow industy standard regulations and are displayed in various forms on the right side of the page. You're able to control how this data is displayed using options beneath the graphic");
	$projections->addQuestion("How long was development?", "It took me more than a month to complete this feature with limited input from a designer. I was given this task during my first week at TrustBuilders and had to build it from the ground up using technologies I had little prior experience with");
	$projections->addQuestion("What technologies were used?", "DevExpress was used for the bar and area graphs. KnockoutJS for UI two-way binding and responsiveness. Bootstrap for layout and CSS styling. Behind the scenes I was forced to make clever use of the Adapter and Delegate design patterns in order to handle some poor decisions made by my senior developer");
	$projections->addQuestion("How would you improve it?", "Currently the back-end makes use of a blob object with unintuitive keys and poorly thought out ecapsulation. Rather than client-side make use of an adapter to transform the data, server-side should just structure the data correctly. A better structure would improve server-side's workflow as well");

	$projections->selectImage($_SESSION['portfolio']['image']);
	$projections->selectQuestion($_SESSION['portfolio']['question']);

	return [ $projections ];
}
