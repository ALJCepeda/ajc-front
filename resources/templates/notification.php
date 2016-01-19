<div class="alert <?= $m->getType() ?> <?= $m->getDismissable() ?>" role="alert">
<?php 	if($m->isDismissable() === TRUE) { 	?>
			<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?php 	}	?>
	<span class="gliphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	<span><?= $m->getStatus() ?> - </span> <?= $m->getMessage() ?>
</div>