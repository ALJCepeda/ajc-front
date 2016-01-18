<?php
require ROOT . "/resources/models/portfolio/entry.php";

function generate_entries() {
	$projections = new Model\Portfolio\Entry("Financial Projections");

	$projections->addImage("Bar", "projections/bar.png");
	$projections->addImage("Chart", "projections/chart.png");
	$projections->addImage("Grouped", "projections/grouped.png");
	$projections->addImage("Expanded", "projections/expanded.png");
	$projections->addImage("Both", "projections/expanded_grouped.png");

	$projections->addQuestion("Is Pluto a planet?", "No it is not a planet");
	$projections->addQuestion("Where's Waldo?", "In Space!");
	$projections->addQuestion("Is this another question?", "Why yes ... yes it is!");

	$projections->selectImage($_SESSION['portfolio']['image']);
	$projections->selectQuestion($_SESSION['portfolio']['question']);

	return [ $projections ];
}
