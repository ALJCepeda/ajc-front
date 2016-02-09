<?php 
		foreach($menuList as $index => $m) {
			if($m->getPath() === $path) {	?>
				<li class="active">
<?php 		} else {	?>
				<li>
<?php 		} 
			if($m->hasMenu() === TRUE) {		?>
				<div class="dropdown">
					<a class="dropdown-toggle default-font" data-toggle="dropdown" href="#">
						<?= $m->getName() ?>
						<b class="caret"></b>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<?php foreach ($m->getMenu() as $i => $subM) { ?>
							<li><a href="<?= $subM->getPath() ?>"><?= $subM->getName() ?></a></li>
						<?php }	?>
					</ul>
				</div>
<?php 		} else  {	?>
				<a href="<?= $m->getPath() ?>"><?= $m->getName() ?></a>
<?php 		}	?>
			</li>
<?php 	}	?>