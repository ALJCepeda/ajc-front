<?php

	if(ISLOCAL){
		$blog = "#";
	} else {
		$blog = "http://blog.aljcepeda.com";
	}

	$notification = '';
	if(isset($_SESSION['redirect'])) {
		$redirect = $_SESSION['redirect'];
		if(!empty($redirect['error'])) {
			//Errors should always have a user friendly message
			$message = $redirect['error']['message'];
			$status = 'Error:';
			$type = 'alert-danger';
		} else if(!empty($redirect['message'])) {
			//Check to see if there's a message to display to the user anyways
			$message = $redirect['message'];
			$status = 'Success:';
			$type = 'alert-success';
		}

		$notification = "<div class='alert $type' role='alert'>" .
							"<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" .
							"<span class='sr-only'>$status</span>" .
							$message .
						"</div>";

		$_SESSION['redirect'] = NULL;
	}
?>

<script>
	$(document).ready(function() {
		$('a[href="' + this.location.pathname + '"]').parent().addClass('active');
	});
</script>
	
<div class="masthead clearfix">
	<?=$notification?>
	<div class="inner">
		<h3 class="masthead-brand">ALJCepeda</h3>
		<nav>
			<ul class="nav masthead-nav">
				<li><a href="/">Home</a></li>
				<li><a href="/user/create">Register</a></li>
				<li><a href= <?=$blog?> >Blog</a></li>
			</ul>
		</nav>
	</div>
</div>