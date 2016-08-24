<?php
require '../../resources/config.php';
require '../../resources/models/portfolio/entries.php';

$entries = generate_entries();
?>
<div class='flex-container'>
	<div class='header'>
		<h1>Portfolio</h1>
	</div>
</div>

<div class='container-fluid'>
	<div class='row-nw m-center c-center'>
		<h3>Projections</h3>
	</div>
	<div class='row-nw m-start c-center'>
		<div class='col-xs-2 menu'>
			<ul>
				<li class='active-underline' style='padding-left:10px'><u>Bar</u></li>
				<li style='padding-left:10px'>Chart</li>
				<li style='padding-left:10px'>Grouped</li>
				<li style='padding-left:10px'>Expanded</li>
				<li style='padding-left:10px'>Both</li>
			</ul>
		</div>
		<div class='col-xs-5'>
			<img src='assets/images/portfolio/projections/bar.png' style='width:100%; height:auto;' />
		</div>
		<div class='col-xs-5 menu-small' style='align-self:flex-start'>
			<ul>
				<li class='active'>
					What technologies were used?
					<div>
						DevExpress was used for the bar and area graphs. KnockoutJS for UI two-way binding and responsiveness. Bootstrap for layout and CSS styling. Behind the scenes I was forced to make clever use of the Adapter and Delegate design patterns in order to handle some poor decisions made by my senior developer
					</div>
				</li>
				<li>
					What's the point of this app?
					<div>
						TerrorTorch's main attraction was the ability to frighten people as they passed by camera by playing a sudden loud sound. The camera would record their reactions and the video would be uploaded to a server to be viewed in a public gallery. This was a project being hosted by the domain http://reBaked.com
					</div>
				</li>
				<li>
					What's the point of this app?
					<div>
						TerrorTorch's main attraction was the ability to frighten people as they passed by camera by playing a sudden loud sound. The camera would record their reactions and the video would be uploaded to a server to be viewed in a public gallery. This was a project being hosted by the domain http://reBaked.com
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
