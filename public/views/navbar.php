<?php
	$menu = [
				'Home' => '/',
			 	'Register' => '/user/create',
			 	'Chat' => '/chat',
			 	'Blog' => 'http://blog.aljcepeda.com'
			];

	if(ISLOCAL){
		$menu['Blog'] = '#';
		//$menu['Chat'] = DOMAIN . ':3000';
	}

	$notify = '';
	$notifications = [];
	if(isset($_SESSION['notification'])) {
		//A notification was set from the previous page
		$notifications[] = $_SESSION['notification'];
		$_SESSION['notification'] = NULL;
	}

	if(isset($parameters['notification'])) {
		//Notification was provided by the router
		$notifications[] = $parameters['notification'];
	}

	if(count($notifications)) {
		foreach($notifications as $index => $notification) {
			$status = isset($notification['status']) ? $notification['status'] : '';
			$type = isset($notification['type']) ? $notification['type'] : 'alert-warning';
			$dismissable = isset($notification['dismissable']) ? 'alert-dismissable' : '';
			$message = $notification['message'];

			$notify .= "<div class='alert $type $dismissable' role='alert'>";
			if($dismissable) {
				$notify .= "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
			}
			
			$notify .= "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" .
							"<span>$status - </span> $message" .
						"</div>";
		}
	}


?>

<script>
	$(document).ready(function() {
		$('a[href="' + this.location.pathname + '"]').parent().addClass('active');
	});
</script>
	
<div class="masthead clearfix">
	<nav class="navbar navbar-fixed-top">
		<div class="container">
			<h3 class="masthead-brand">ALJCepeda</h3>
			<ul class="nav masthead-nav">
				<?php foreach($menu as $label => $url) { ?>
					<li><a href="<?=$url?>"><?=$label?></a></li>
				<?php } ?>
			</ul>
		</div>
	</nav>
</div>

<?=$notify?>