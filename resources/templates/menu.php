<?php 
		foreach($menuList as $index => $m) {
			if($m->isActive() === TRUE) {	?>
				<li class="active">
<?php 		} else {	?>
				<li>
<?php 		} 
			if($m->hasMenu() === TRUE) {		?>
				<?= $m->getName() ?>
				<ul>
<?php				render_template("menu", $m->getMenu());	?>
				</ul>
<?php 		} else  {	?>
				<a href="<?= $m->getPath() ?>"><?= $m->getName() ?></a>
<?php 		}	?>
			</li>
<?php 	}	?>