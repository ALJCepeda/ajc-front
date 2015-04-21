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

if($hasSession && !$hasToken) {
	//Improperly configured session encoutered
	//All valid php sessions should have a valid JWT as well
	trigger_error('USR: Invalid Session - SessionID provided but missing JWT');
	trigger_error('SERVER: ' . print_r($_SERVER, true));

	invalidateSession('/error/invalid');
}

else if(!$hasSession && $hasToken) {
	trigger_error('USR: Invalid Session - JWT provided by missing session');
	trigger_error('SERVER: ' . print_r($_SERVER, true));

	invalidateSession('/error/invalid');
}

session_start();
$jwtmanager = new TokenManager(JWTKEY);

if(!$hasSession && !$hasToken) {
	$jwtmanager->createPayload();
	$valid = TRUE;
} else {
	$valid = $jwtmanager->validateJWT($token);
}

if(!$valid) {
	trigger_error('SVR: Invalid JWT - Wan unable to obtain payload.');
	trigger_error('JWT: ' . print_r($token, true));
	trigger_error('SERVER: ' . print_r($_SERVER, true));

	invalidateSession('/error/invalid');
}


//All post actions should be accompanied by a nonce
$nonced = $jwtmanager->validateNonce();
if(!$nonced) {
	trigger_error('SVR: Invalid Nonce - Was expected nonce did not match the request nonce');
	trigger_error('EXP_NONCE: ' . print_r($_SESSION['nonce'], true));
	trigger_error('RQST_NONCE: ' . $nonce);

	invalidateSession('/error/invalid');
}

$sessionExp = time() + (60 * 60); //Session expires in 1 hour
$jwtmanager->updateExpiration($sessionExp);

$token = $jwtmanager->encodePayload();
setcookie('X-Auth-Token', $token, $sessionExp, '/');


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