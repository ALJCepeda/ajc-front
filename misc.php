<?php

function validateRequest($required) {
    $post = filter_input_array(INPUT_POST);
    $missing = array_diff($required, array_keys($post));
    if($missing) {
        //We don't redirect here because this isn't an error a user should encounter
        redirect_error(400, '', 'request', 'Invalid request, missing required parameters: ' . implode(', ', $missing));
        die;
    } else {
        //Valid request, initalize required parameters
        initGlobalVariables($post, $required);
    }
}

/*
	Recaptcha validation 
	Send POST request along with recaptcha details to determine if it was answered correctly
*/
function validateRecaptcha($grecaptcharesponse) {
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
		redirect_error(409, '/user/create', 'recaptcha', 'Whoops looks like you got the recaptcha wrong, please try again' );
		die;
	}
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

function respond($code, $response, $location = '/') {
	http_response_code($code);

	if(session_status() == PHP_SESSION_ACTIVE) {
		$_SESSION['redirect'] = $response;
		header("Location:$location");
	} else {
		echo json_encode($response);
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

?>