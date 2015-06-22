<?php

include 'config.php';

//Will redirect user to security fault page and kill script if error is encountered
//Initializes and configures $jwtmanager
include ROOT . '/resources/security/validatesession.php';

//Does final updates to JWT and resets cookie
include ROOT . '/resources/security/updatesession.php';

$builder = new DI\ContainerBuilder();
$builder->addDefinitions(ROOT . '/resources/dependencyrules.php');
$container = $builder->build();

include ROOT . '/resources/dependencyrules.php';

recordRequest();
function recordRequest( $max = 0 ) {
	if(!isset($_SESSION['history'])) {
		$_SESSION['history'] = [];
	}

	$history = $_SESSION['history'];
	$requestURI = filter_input(INPUT_SERVER, 'REQUEST_URI');

	if(count($history) && $history[count($history) - 1] == $requestURI) {
		return;
	}

	if($max != 0 && count($history) >= $max) {
	 	array_shift($history);
	}

	$history[] = $requestURI;
	$_SESSION['history'] = $history;
}
?>