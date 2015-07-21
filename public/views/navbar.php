<?php
	$menuList = [
				'Home' => '/',
			 	'Register' => '/user/create',
			 	'Chat' => '/chat',
			 	'Repair' => '/repair',
			 	'Blog' => 'http://blog.aljcepeda.com'
			];

	if(ISLOCAL){
		$menuList['Blog'] = '#';
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

	$menu = '';
	if(count($menuList)) {
		foreach($menuList as $label => $url) {
			$menu .= "<li><a href='$url'>$label</a></li>";
		}
	}
?>

<style type="text/css">
	#site-navbar {
		width: 100%;
		display: flex;
		flex-flow: row nowrap;
	}

	.navigation {
	  display: flex;
	  flex-flow: row;
	  /* This aligns items to the end line on main-axis */
	  justify-content: space-around;
	  align-items: center;
	}

	.navigation > li {
    	list-style-type: none;
    	padding:5px;
    	margin:2px;
   	}

   	.navigation > li > a {
   		color: white;
   		text-decoration: none;
   	}

   	.navigation > li.active {
   		border-bottom:1px solid #fff;
    	
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
	<h4>ALJCepeda</h4>
	<?=$menu?>
</ul>

<?=$notify?>


