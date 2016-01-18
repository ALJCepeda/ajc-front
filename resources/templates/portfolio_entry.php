<?php
	$imageURL = STATICURL . "/images/portfolio";
	$selectedURL = "$imageURL/".$images[$selectedImage];
?>

<div class="row-w m-between">
	<div class="header">
		<h3><?= $title ?></h3>
	</div>

	<div class="left col-nw m-between">
		<form action="/actions/portfolio/select.php" method="POST">
			<div class="row-nw m-around c-center">
				<?php foreach ($images as $name => $image) { ?>
					<button class="f-aside orange button" type="submit" name="image" value="<?= $name ?>">
						<?= $name ?>
					</button>
				<?php } ?>
			</div>
		</form>

		<img src="<?= $selectedURL ?>" style="width:100%; height:auto; margin-bottom:10px;" />
	</div>
    
	<div class="right col-nw m-start c-center y-scroll">
		<form action="/actions/portfolio/select.php" method="POST" style="width:100%">
			<?php foreach ($questions as $index => $entry) { ?>
				<button class="blue button" style="width:100%" type="submit" name="question" value="<?= $index ?>">
					<?= $entry["Q"] ?>
				</button>

				<?php if($selectedQuestion === $index) { ?>
					<div>
						<p>
							<?= $entry["A"] ?>
						</p>
					</div>
				<?php } ?>
			<?php } ?>
		</form>
	</div>
</div>