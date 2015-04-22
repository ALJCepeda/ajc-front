<?php

if(strpos($_SERVER['REQUEST_URI'], 'error')) {
	//No need to validate the session if the user has encountered an error
	return;
}

include ROOT . '/resources/classes/security/jwtmanager.php';

$sessionID = isset($_COOKIE['PHPSESSID']) ? $_COOKIE['PHPSESSID'] : '';
$token = isset($_COOKIE['X-Auth-Token']) ? $_COOKIE['X-Auth-Token'] : '';
$hasSession = !empty($sessionID);
$hasToken = !empty($token);


if( ($hasSession && !$hasToken) || (!$hasSession && $hasToken) ){
	destroySession();
}

session_start();
$jwtmanager = new TokenManager(JWTKEY);

if(!$hasSession || !$hasToken) {
	$tokenID = $jwtmanager->createPayload($sessionID);
} else {
	$tokenID = $jwtmanager->validateJWT($token, $sessionID);
}


if(!$tokenID) {
	trigger_error('SVR: Invalid JWT - Wasnt able to obtain payload.');
	trigger_error('JWT: ' . print_r($token, true));
	trigger_error('SERVER: ' . print_r($_SERVER, true));

	invalidateSession('/error/invalid');
}




//Check to see if a nonce was created and validate it
$nonced = $jwtmanager->validateNonce();
if(!$nonced) {
	trigger_error('SVR: Invalid Nonce - Was expected nonce did not match the request nonce');
	trigger_error('EXP_NONCE: ' . print_r($_SESSION['nonce'], true));
	trigger_error('RQST_NONCE: ' . $nonce);

	invalidateSession('/error/invalid');
}


/*********************************
 *
 * Page functions
 *
 *********************************/

function invalidateSession($redirect = ''){
	destroySession();

	if(!empty($redirect)){
		header("Location: $redirect", true, 301);
		die;
	}
}

function destroySession(){
	if(!isset($_SESSION)){
		session_start();
	}
	
	session_unset();
	session_destroy();

	unset($_COOKIE['PHPSESSID']);
	setcookie('PHPSESSID', NULL, -1, '/');

	unset($_COOKIE['X-Auth-Token']);
	setcookie('X-Auth-Token', NULL, -1, '/');
	
}
?>