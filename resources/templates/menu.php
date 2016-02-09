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
					  	<li><a tabindex="-1" href="#">Action</a></li>
					  	<li><a tabindex="-1" href="#">Another action</a></li>
					  	<li><a tabindex="-1" href="#">Something else here</a></li>
					  	<li class="divider"></li>
					  	<li><a tabindex="-1" href="#">Separated link</a></li>
					</ul>
				</div>
<?php 		} else  {	?>
				<a href="<?= $m->getPath() ?>"><?= $m->getName() ?></a>
<?php 		}	?>
			</li>
<?php 	}	?>