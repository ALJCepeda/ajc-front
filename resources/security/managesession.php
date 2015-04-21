<?php
include ROOT . '/vendor/firebase/php-jwt/Authentication/JWT.php';

if(strpos($_SERVER['REQUEST_URI'], 'error')) {
	return;
}

if(isset($_COOKIE['PHPSESSID'])){
	if(!isset($_COOKIE['X-Auth-Token'])){
		//Improperly configured session encoutered
		//All valid php sessions should have a valid JWT as well
		trigger_error('USR: Invalid Session - SessionID provided but missing JWT');
		trigger_error('SERVER: ' . print_r($_SERVER, true));

		invalidateSession();
	} else {
		//We have both a sessionID and JWT
		//Now's the time to verify that this is a valid session
		session_start();
		$token = $_COOKIE['X-Auth-Token'];

		$payload = validateJWT($token, JWTKEY);
		if(!$payload) {
			trigger_error('SVR: Invalid JWT - Was unable to decode token');
			trigger_error('JWT: ' . print_r($token, true));
			trigger_error('SERVER: ' . print_r($_SERVER, true));

			invalidateSession();
		}

		$nonced = validateNonce($payload);
		if(!$nonced) {
			$nonce = isset($payload['nonce']) ? $payload['nonce'] : 'N/A';

			trigger_error('SVR: Invalid Nonce - Was expected nonce did not match the request nonce');
			trigger_error('EXP_NONCE: ' . print_r($_SESSION['nonce'], true));
			trigger_error('RQST_NONCE: ' . $nonce);

			invalidateSession();
		}
	}
} else {
	//Create a new session and JWT
	session_start();
	$token = createJWT(JWTKEY);
	
}

refreshToken($token);

?>

<?php

function validateNonce($payload){
	if(!isset($_SESSION['nonce'])){
		return TRUE;
	}

	if(!isset($payload['nonce']) || $_SESSION['nonce'] != $payload['nonce']) {
		return FALSE;
	}

	return TRUE;
}

function refreshToken($token, $payload = NULL) {
	if(!$payload){
		$payload = validateJWT($token, JWTKEY);
	}

	$sessionExp = time() + (60 * 60); //Session expires in 1 hour
	$payload['exp'] = $sessionExp;

	$token = JWT::encode($payload, JWTKEY);
	setcookie('X-Auth-Token', $token, $sessionExp, '/');
}

function createJWT($key) {
	$payload = [
	    'iss' => DOMAIN,
	    'aud' => DOMAIN,
	    'sub' => 'guest',
	    'iat' => time(),
	    'exp' => time()
	];

	return JWT::encode($payload, $key);
}

function validateJWT($token, $key){
	try {
		$payload = (array)JWT::decode($token, $key, array('HS256'));

		if($payload['exp'] > time()){
			if(FALSE) {
				//Token has expired, if user is logged in, log him out
				//Then return to main page
			}
		}

		return $payload;
	} catch (Exception $e){
		return FALSE;
	}
}
function invalidateSession(){
	destroySession();		

	header('Location: /error/invalid', true, 301);
	die;
}

function destroySession(){
	session_start();
	session_unset();
	session_destroy();

	unset($_COOKIE['PHPSESSID']);
	setcookie('PHPSESSID', NULL, -1, '/');

	unset($_COOKIE['X-Auth-Token']);
	setcookie('X-Auth-Token', NULL, -1, '/');
	

}
?>