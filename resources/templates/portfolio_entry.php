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
		width:67%;
	}
	.right {
		width:30%;
	}
	.portfolio_entry {
		display: flex;
	  	flex-flow: row wrap;
	  	justify-content:space-around;
	}
</style>

<div class="row-w m-between">
	<div class="header">
		<h3><?= $title ?></h3>
	</div>

	<div class="left col-nw m-between">
		<img src="<?= $selectedURL ?>" style="width:100%; height:auto; margin-bottom:10px;" />

		<div class="row-nw m-middle c-middle" style="width:100%;">	
			<?php foreach ($images as $name => $image) { ?>
				<form action=<?= "/actions/portfolio/select.php" ?> method="POST" style="margin-right:20px;">
					<input class="orange button btn btn-default" type="submit" name="image" value="<?= $name ?>">
				</form>
			<?php } ?>
		</div>
	</div>

	<div class="right col-nw m-start c-start">
		<?php foreach ($questions as $index => $entry) { ?>
			<div class="blue row-nw m-center c-center" style="width:100%; height:50px;">
				<label><?= $entry["Q"] ?></label>
			</div>
		<?php } ?>
	</div>
</div>