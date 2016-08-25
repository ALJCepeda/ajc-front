<?php
require '../../resources/config.php';
?>

<div class='flex-container'>
	<div class='header'>
		<h1>Portfolio</h1>
	</div>
</div>

<div data-bind='foreach: entries'>
	<div class='container-fluid' data-bind='attr: { id:$data.id }'>
		<div class='row-nw m-center c-center'>
			<h3 data-bind='text: $data.name'></h3>
		</div>
		<div class='row-nw m-start c-center'>
			<div class='col-xs-2 menu'>
				<ul data-bind='foreach: $data.images'>
					<li style='padding-left:10px' data-bind='click:$parent.clickedImage, css: { "active-underline":$data.isActive }'>
						<span data-bind='text:$data.name'></span>
					</li>
				</ul>
			</div>
			<div class='col-xs-5'>
				<img style='width:100%; height:auto;' data-bind='attr: { src:$data.imageSRC }' />
			</div>
			<div class='col-xs-5 menu-small' style='align-self:flex-start; overflow:auto'>
				<ul data-bind='foreach:$data.faq'>
					<li data-bind='click:$parent.clickedFAQ, css: { active:$data.isActive }'>
						<span data-bind='text:$data.question'></span>
						<div data-bind='text:$data.answer'></div>
					</li>
				</ul>
			</div>
		</div>
		<hr data-bind='visible: $data.id !== "ipad"'>
	</div>
</div>
