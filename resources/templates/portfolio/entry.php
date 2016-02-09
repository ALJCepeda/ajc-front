<?php
	//var_dump($m->images);
	$imageURL = STATICURL . "/images/portfolio";
	$selectedURL = "$imageURL/".$m->image();
?>

<div class="row-w m-between portfolio_entry">
	<div class="header">
		<h3><?= $m->title ?></h3>
	</div>

	<div class="left col-nw m-between">
		<form action="/actions/portfolio/select.php?section=<?= $key ?>" method="POST" style="margin-bottom:10px;">
			<div class="row-nw m-around c-center">
		<?php 	foreach ($m->images as $name => $image) { 	?>
					<button class="f-aside button transparent" type="submit" name="image" value="<?= $name ?>">
						<font class="<?= $m->selImage === $name ? 'active' : '' ?>">
							<?= $name ?>
						</font>
					</button>
		<?php 	}	?>
			</div>
		</form>

		<a href="<?= $selectedURL ?>" target="_blank">
			<img src="<?= $selectedURL ?>" style="width:100%; height:auto; max-height:350px;" />
		</a>
	</div>
    
	<div class="right col-nw m-start c-center y-scroll">
		<form action="/actions/portfolio/select.php?section=<?= $key ?>" method="POST" style="width:100%">
			<?php foreach ($m->questions as $index => $entry) { ?>
				<button class="blue button" style="width:100%" type="submit" name="question" value="<?= $index ?>">
					<?= $entry["Q"] ?>
				</button>

				<?php if($m->selQuestion === $index) { ?>
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