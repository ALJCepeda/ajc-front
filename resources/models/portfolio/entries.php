<?php
function generate_entries() {
	$interest = new Model\Portfolio\entry('Interest Calculator');
	$interest->addImage('Chart', 'interest/chart');
	$interest->addImage('Grid', 'interest/grid');
	$interest->addImage('Loading', 'interest/loading');
	$interest->addImage('FullGrid', 'interest/fullgrid');
	$interest->addImage('FullChart', 'interest/fullchart');
	$interest->addImage('EditGrid', 'interest/editgrid');

	$interest->addQuestion('What\'s the point of this app?', 'This is a calculator that takes some basic financial information and calculates a rough estimate of how their accounts will grow over time. It can also guess different field such as the number of years or the annual interest rate necessary for the account the reach a final value.');
	$interest->addQuestion('How long was development', 'It took about 3 1/2 months, I\'ve developed most of this feature except for few minor backend tasks like user preferences.');
	$interest->addQuestion('What are some special design features?', 'Fully responsive UI that fits the width of any device. The ui is completely non-blocking and all the code is beautifully organized and fully unit tested');

	$other = new Model\Portfolio\entry('Other Work');
	$other->addImage('Gameofficials', 'other/gameofficials');
	$other->addImage('Divergence', 'other/divergence');
	$other->addImage('Bodyworks', 'other/bodyworks');
	$other->addImage('Clinipro', 'other/clinipro');
	$other->addImage('Omnipod', 'other/omnipod');
	$other->addImage('Diabetes', 'other/diabetes');

	return [];
}
