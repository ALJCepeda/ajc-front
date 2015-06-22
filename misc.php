<?php

function requireInput($required, $input, $onMissing = '') {
	if(!is_array($input)) {
		$input = phpInput($input);
	}

	$input = array_filter($input);
    $missing = array_diff($required, array_keys($input));

	if(count($missing)){
		if(is_callable($onMissing)) {
			$onMissing($missing);
		} else {
			respond_error(400, 'request', 'Invalid request, missing required parameters');
			die;
		}
	}

	return array_extract_keys($input, $required);
}

function phpInput($input) {
	switch($input) {
		case 'post':
			return filter_input_array(INPUT_POST);
		break;

		case 'get':
			return filter_input_array(INPUT_GET);
		break;

		case 'server':
			return filter_input_array(INPUT_SERVER);
		break;
	}

	return [];
}

/*
	Recaptcha validation 
	Send POST request along with recaptcha details to determine if it was answered correctly
*/
function validRecaptcha($grecaptcharesponse) {
	if(ISLOCAL){
		//Always assume a valid captcha when local
		return true;
	}
	
	$url = RECAPTCHAURL;
	$data = [ 'secret' => RECAPTCHASCRT, 'response' => $grecaptcharesponse, 'remoteip' => filter_input(INPUT_SERVER, 'REMOVE_ADDR') ];
	$options = 	[ 'http' => [
						'header' => 'Content-type: application/x-www-form-urlencoded\r\n',
						'method' => 'POST',
						'content' => http_build_query($data)
					]
				];
	$context = stream_context_create($options);
	$result = json_decode(file_get_contents($url, false, $context), true);

	if(!$result['success']) {
		//Looks like we have an invalid recaptcha
		trigger_error('Recaptcha responded with an error' + dump_var($result));
		die;
		return false;
	}

	return true;
}

function respond_error($code, $type, $message, $location = '/') {
	global $response;
	if(!$response) {
		$response = defaultResponse();
	}

	//Looks like we have an invalid recaptcha
	$response['status'] = 'failed';
	$response['error'] = [ 'type' => $type, 'message' => $message ];

	respond($code, $response, $location);
}

function respond_success($message, $location = '/') {
	global $response;
	if(!$response) {
		$response = defaultResponse();
	}

	$response['message'] = $message;

	respond(200, $response, $location);
}

function respond($code, $notification, $location = '/') {
	http_response_code($code);

	if(session_status() == PHP_SESSION_ACTIVE) {
		$_SESSION['notification'] = $notification;
		header("Location:$location");
	} else {
		echo json_encode($notification);
	}
}

function defaultResponse() {
	return [ 'status' => 'success', 'error' => '', 'uri' => DOMAIN . filter_input(INPUT_SERVER, 'REQUEST_URI') ];
}

function GET_CONSTANT($name){
	global $container;
	if(isset($GLOBALS['CONSTANTS'][$name])){
		return $GLOBALS['CONSTANTS'][$name];
	}

	$main = $container->get('ServerDB');

	$result = $main->Constants()->select('value', 'datatype')->where('name', $name);

	if(!count($result)){
		trigger_error("No constant exists by the name($name)");
		return NULL;
	}

	$type = $result[0]['datatype'];
	$value = $result[0]['value'];

	if($type == 'INT'){
		$value = intval($value);
	}

	$GLOBALS['CONSTANTS'][$name] = $value;

	return $value;
}

function randomString($length, $shuffles = 2) {
	$password = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";

	$i = 0;
	do {
		$password = str_shuffle($password);
	} while(++$i <= $shuffles);

	return substr($password, 0, $length);
}

?>