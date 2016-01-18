<?php
	$imageURL = STATICURL . "/images/portfolio";
	$selectedURL = "$imageURL/".$images[$selectedImage];
?>

<div class="row-w m-between">
	<div class="header">
		<h3><?= $title ?></h3>
	</div>

	<div class="left col-nw m-between">
		<form class="row-nw m-around c-center" style="width:100%;" action=<?= "/actions/portfolio/select.php" ?> method="POST">
			<?php foreach ($images as $name => $image) { ?>
				<input class="f-aside orange button" type="submit" name="image" value="<?= $name ?>">
			<?php } ?>
		</form>

		<img src="<?= $selectedURL ?>" style="width:100%; height:auto; margin-bottom:10px;" />
	</div>

	<div class="right col-nw m-start c-center y-scroll">
		<?php foreach ($questions as $index => $entry) { ?>
			<div class="blue row-nw m-center c-center" style="width:100%; height:50px;">
				<label><?= $entry["Q"] ?></label>
			</div>
		<?php } ?>
	</div>
</div>