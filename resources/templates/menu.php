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

					<ul class="dropdown-menu dropdown-menu-right" style="background-color:silver">
						<?php foreach ($m->getMenu() as $i => $subM) { ?>
							<li>
								<a href="<?= $subM->getPath() ?>">
									<span style="color:black">
										<?= $subM->getName() ?>
									</span>
								</a>
							</li>
						<?php }	?>
					</ul>
				</div>
<?php 		} else  {	?>
				<a href="<?= $m->getPath() ?>"><?= $m->getName() ?></a>
<?php 		}	?>
			</li>
<?php 	}	?>