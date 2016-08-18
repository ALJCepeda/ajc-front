<?php

require 'config.php';

//Will redirect user to security fault page and kill script if error is encountered
//Initializes and configures $jwtmanager
if(strpos($_SERVER["REQUEST_URI"], "error")) {
	//No need to validate the session if the user has encountered an error
	return;
}

session_start();

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
