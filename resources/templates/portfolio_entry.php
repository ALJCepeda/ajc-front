<?php
	$imageURL = STATICURL . "/images/portfolio";
	$selectedURL = "$imageURL/".$images[$selectedImage];
?>

<style type="text/css">
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

<div class="portfolio_entry">
	<div class="header">
		<h3><?= $title ?></h3>
	</div>
	<div class="aside left">
		<img src="<?= $selectedURL ?>" width="100%" height="auto" />

		<form action= <?= SNAKEURL ?> >
			<?php foreach ($images as $name => $image) { ?>
				<input class="orange button btn btn-default" type="submit" value="<?= $name ?>">
			<?php } ?>
		</form>
	</div>

	<div class="aside right">
		<?php foreach ($questions as $index => $entry) { ?>
			<div>
				<?= $entry["Q"] ?>
			</div>
		<?php } ?>
	</div>
</div>