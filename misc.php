<?php

function add_defaults($var, $defaults) {
	if(is_array($var)) {
		foreach ($defaults as $key => $value) {
			if(isset($var[$key]) === false) {
				$var[$key] = $value;
			}
		}
	}

	return $var;
}

function render_template($template, $model) {
	$url = ROOT . "/resources/templates/" . $template;
	render($url, $model);
}

function render_view($view, $model) {
	$url = ROOT . "/public/views/" . $view;
	render($url, $model);
}

function render($url, $model) {
	if($model !== null) { extract($model); }

	require $url . ".php";
}

function arrayTo_HTMLList($array, $attributesForItem) {
	$html = '';

	if(!is_callable($attributesForItem)) {
		$attributesForItem = function() { return ''; };
	}

	if(count($array)) {
		foreach($array as $label => $value) {
			$attributes = $attributesForItem($label, $value);

			$html .= "<li $attributes>";
			if(is_string($value)) {
				//If we're given a string, assume it's a valid URL
				$html .= "<a href='$value'>$label</a>";
			}
			
			else if(is_array($value)) {
				//We have a list of items, recursively generate HTML
				$html .= "$label";
				$html .= "<ul>";
					$html .= arrayTo_HTMLList($value, $attributesForItem);
				$html .= "</ul>";
			}
			$html .= "</li>";
		}
	}

	return $html;
}

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

	$result = $main->exec('SELECT value, datatype FROM Constants WHERE name = ?', $name);

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

function scriptRespondsTo($functionName){
	$functions = get_defined_functions();
	$udf = $functions['user'];

	return in_array(strtolower($functionName), $udf);
}

function invalidateSession($redirect = ''){
	destroySession();

	if(!empty($redirect)){
		header("Location: $redirect", true, 301);
	}
}

function destroySession(){
	if(session_status() == PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	session_unset();
	session_destroy();

	unset($_COOKIE['X-Auth-Token']);
	setcookie('X-Auth-Token', NULL, -1, '/');
}
/*
	This file contains lone utility functions that don't belong anywhere else
*/
function bindValues($statement, $bindings){
	foreach($bindings as $bind => $value){
		$statement = str_replace($bind, $value, $statement);
	}
	
	return $statement;
}
/*
	Splits string into array based on capital letters
*/
function strSplitCaps($input){
	$result = [];
	$startIndex = 0;
	$length = strlen($input);
	for($i = 0 ; $i < $length; $i = $i + 1){
		if(ctype_upper($input[$i])){
			array_push($result, substr($input, $startIndex, $i - $startIndex));
			$startIndex = $i;
		}
	}
	if($startIndex < $length){
		array_push($result, substr($input, $startIndex, $length - $startIndex));
	}
	return $result;
}
/*
	Initializes variables with the name and value of the associative array
*/
function keysToVariables($array){
	foreach($array as $key => $value){
		echo $key . "</br>";
		$statement = "global $".$key."; $".$key."= \$value;";
		eval($statement);
		echo $methodcode . "</br>";
	}
}
/*
	Slightly prettier variable dump than var_dump()
*/
function dump_var($var){
	echo "<pre><code>";
	echo print_r($var);
	echo "</pre></code></br>";
}
/*
	Fills in NULL with consecutive numbers
*/
function fillIn($array){
	$counter = 0;
	foreach($array as $key => $value){
		$array[$key] = $counter;
		$counter++;
	}
	return $array;
}
function objectToJSON($obj){
	$jsonString = '{';
	foreach($obj as $key => $value){
		$jsonString .= '"' . strtolower($key) . '"';
	}
}
/*
	Returns type of variable as a string
*/
function implicitType($input){
	if(is_string($input)){
		return 'string';
	}
	if(is_long($input)){
		return 'long';
	}
	if(is_integer($input)){
		return 'integer';
	}
	if(is_double($input)){
		return 'double'; 
	}
	if(is_array($input)){
		return 'array';
	}
	if(is_scalar($input)){
		return 'scalar';
	}
	if(is_object($input)){
		return get_class($input);
	}
	return 'mixed';
}
function initGlobal($field, $value){
	eval("global $" . $field . "; $" . $field . " = \$value;");
}
function castValue($value, $type){
	if($type == "date"){
		return date($value);
	}
	if($type == "datetime"){
		$timezone = isset($_SERVER["TIMEZONE"]) ? $_SERVER["TIMEZONE"] : new DateTimeZone('America/Los_Angeles');
		$datetime = DateTime::createFromFormat("!m/d/Y",  $value, $timezone);
		return $datetime; 
	}
}
function copyKeys($array){
	$result = [];
	foreach($array AS $key => $value){
		$result[$key] = "";
	}
	return $result;
}