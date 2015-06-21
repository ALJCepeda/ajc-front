<?php

	if(ISLOCAL){
		$blog = "#";
	} else {
		$blog = "http://blog.aljcepeda.com";
	}

	$notify = '';
	if(isset($_SESSION['notification'])) {
		$notification = $_SESSION['notification'];
		if(!empty($notification['error'])) {
			//Errors should always have a user friendly message
			$message = $notification['error']['message'];
			$status = 'Error:';
			$type = 'alert-danger';
		} else if(!empty($notification['message'])) {
			//Check to see if there's a message to display to the user anyways
			$message = $notification['message'];
			$status = 'Success:';
			$type = 'alert-success';
		}

		$notify = "<div class='alert $type' role='alert'>" .
						"<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" .
						"<span class='sr-only'>$status</span>" .
						$message .
					"</div>";

		$_SESSION['notification'] = NULL;
	}
?>

<script>
	$(document).ready(function() {
		$('a[href="' + this.location.pathname + '"]').parent().addClass('active');
	});
</script>
	
<div class="masthead clearfix">
	<?=$notify?>
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