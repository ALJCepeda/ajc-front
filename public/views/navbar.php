<?php
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
			$active = ($url === $context->getPathInfo()) ? "class='active'" : '';

			$menu .= "<li $active><a href='$url'>$label</a></li>";
		}
	}
?>

<ul class="navigation">
	<h4>ALJCepeda</h4>
	<?=$menu?>
</ul>

<?=$notify?>