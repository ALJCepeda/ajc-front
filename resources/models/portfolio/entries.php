<?php
function generate_entries() {
	$projections = new Model\Portfolio\Entry('Financial Projections');
	$projections->addImage('Bar', 'projections/bar.png');
	$projections->addImage('Chart', 'projections/chart.png');
	$projections->addImage('Grouped', 'projections/grouped.png');
	$projections->addImage('Expanded', 'projections/expanded.png');
	$projections->addImage('Both', 'projections/expanded_grouped.png');

	$projections->addQuestion('What am I looking at?', 'On the left side is a panel which allows you to control how (and which) calculations are done. The projections follow industy standard regulations and are displayed in various forms on the right side of the page. You\'re able to control how this data is displayed using options beneath the graphic');
	$projections->addQuestion('How long was development?', 'It took me more than a month to complete this feature with limited input from a designer. I was given this task during my first week at TrustBuilders and had to build it from the ground up using technologies I had little prior experience with');
	$projections->addQuestion('What technologies were used?', 'DevExpress was used for the bar and area graphs. KnockoutJS for UI two-way binding and responsiveness. Bootstrap for layout and CSS styling. Behind the scenes I was forced to make clever use of the Adapter and Delegate design patterns in order to handle some poor decisions made by my senior developer');
	$projections->addQuestion('What are some special design features?', 'Fully responsive UI that fits the width of any device. The ui is completely non-blocking and all the code is beautifully organized and fully unit tested');
	$projections->addQuestion('How would you improve it?', 'Currently the back-end makes use of a blob object with unintuitive keys and poorly thought out ecapsulation. Rather than client-side make use of an adapter to transform the data, server-side should just structure the data correctly. A better structure would improve server-side\'s workflow as well');

	$repair = new Model\Portfolio\entry('Electronic Repair');
	$repair->addImage('Broken', 'ipad/broken.jpg');
	$repair->addImage('Opened', 'ipad/opened.jpg');
	$repair->addImage('Repaired', 'ipad/repaired.jpg');
	$repair->addImage('Finished', 'ipad/finished.jpg');

	$repair->addQuestion('How long did it take?', 'The entire process from start to finish took less than 30 minutes');
	$repair->addQuestion('How much did it cost?', 'In order to buy all the toys and necessary parts to perform the repair cost a total of $140...which was still $70 less than the $200 pricetag the Apple store gave me');
	$repair->addQuestion('Will you repair my device?', 'Sure, but better yet I\'ll point you to the resources so you can do it yourself. Its really easy, will save you a ton of money and boost your confidence for repairing other electronics');

	$terror = new Model\Portfolio\entry('Terror Torch(iOS)');
	$terror->addImage('FrontUI', 'terror/frontui.png');
	$terror->addImage('Gallery', 'terror/gallery.png');
	$terror->addImage('Camera', 'terror/camera.jpg');
	$terror->addImage('Sound', 'terror/sound.png');
	$terror->addImage('About', 'terror/about.png');

	$terror->addQuestion('What\'s the point of this app?', 'TerrorTorch\'s main attraction was the ability to frighten people as they passed by camera by playing a sudden loud sound. The camera would record their reactions and the video would be uploaded to a server to be viewed in a public gallery. This was a project being hosted by the domain http://reBaked.com');
	$terror->addQuestion('What\'s the big power button in FastUI?', 'The app also featured a flashlight which is managed by this control. It\'s possible to adjust the intensity of the flashlight by rotating this control like a dial');
	$terror->addQuestion('How long did it take?', 'It took a little more than three months to complete, I was the project\'s only programmer. TerrorTorch was tested, approved and uploaded to iTunes Connect where it awaited final approval from the project manager. It was never released :(');
	$terror->addQuestion('Why was it never released?', 'I wish I knew. I was never contacted by the project manager and the domain was sold soon after. As far as I know the project is still waiting to be sent for review... I sometimes wonder the legal issues of releasing the app myself but I haven\'t done the research');
	$terror->addQuestion('What are some special design features?', 'Motion detection is able to sense when a person passes infront of the camera. Videos uploaded to server and shared on a youtube gallery. Was developed during iOS Beta 8 series and was ready to release before the beta was completed, written almost entirely in Swift');

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

	return [
		'projections'=>$projections,
		'interest'=>$interest,
		'terror'=>$terror,
		'repair'=>$repair,
		'other'=>$other
	];
}
