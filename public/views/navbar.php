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
			
			$notify .= 		"<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" .
							"<span>$status - </span> $message" .
						"</div>";
		}
	}


?>

<style type="text/css">
	#site-navbar {
		width: 100%;
		display: flex;
		flex-flow: row nowrap;
	}

/*
	#nav-header {
		align-self: flex-start;
	}
	#nav-menu {
		align-self: flex-end;
	}*/
	.navigation {
	  display: flex;
	  flex-flow: row;
	  /* This aligns items to the end line on main-axis */
	  justify-content: space-around;
	  align-items: center;
	}

	.navigation > li {
    	list-style-type: none;
	}

	/* Small screens */
	@media all and (max-width: 500px) {
	  .navigation {
	    /* On small screens, we are no longer using row direction but column */
	    flex-direction: column;
	  }
	}
</style>

<script>
	$(document).ready(function() {
		$('a[href="' + this.location.pathname + '"]').parent().addClass('active');
	});
</script>

<ul class="navigation">
	<a id="nav-header" class="navbar-brand">ALJCepeda</a>
	<?php foreach($menu as $label => $url) { ?>
		<li><a href="<?=$url?>"><?=$label?></a></li>
	<?php } ?>
</ul>

<?=$notify?>


