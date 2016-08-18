<?php

$post = filter_input_array(INPUT_POST);

$redirect = isset($_SESSION['redirect']) ? $_SESSION['redirect'] : '/';
$_SESSION['redirect'] = null;

$hiddenInputs = '';
if(is_array($post)) {
	foreach( $post as $name => $value ) {
		$name = htmlspecialchars($name);
		$value = htmlspecialchars($value);

		$hiddenInputs .= "<input type='hidden' name='$name' value='$value' \>";
	}
}

?>

<style>
.img-responsive {
	margin: 0 auto;
}
</style>

<script>
	$(document).ready(function() {
		$('a[href]').parent().addClass('disabled').on("click", function(event) {
			event.preventDefault();
			this.removeClass('active');
		});

		$('form#redirectPost').submit();
	});
</script>

<div class="inner cover">
   	<h1 class="cover-heading">Loading ... </br> </br> </h1>
   	<img class="img-responsive" width="50%" height="50%" src="/assets/images/pleasewait.gif" alt="Chania">
</div>

<form id='redirectPost' action="<?= $redirect ?>" method="POST" >
	<?= $hiddenInputs ?>
</form>