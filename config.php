<?php
error_reporting(-1);

include 'aljcepeda.php';
include 'constants.php';
include VENDOR . '/autoload.php';
include VENDOR . '/aljcepeda/misc/misc.php';
include ROOT . '/misc.php';

//set_error_handler('generalErrorHandler');
set_exception_handler('generalErrorHandler');

function generalErrorHandler($e, $detail = '') {
	if(ISLOCAL) {
		echo "</br><pre><code>";
		echo "Error: $e - $detail";
		echo "</pre></code></br>";
	} else {
		if(filter_input(INPUT_SERVER, 'REQUEST_URI') == '/error/invalid') {
			//Break out of redirect loop and log
			echo "I blew up in a horrible way. It's been logged and will be dealt with";
		} else {
			header("Location:/error/invalid");
		}
	}

	die;
}
date_default_timezone_set(TIMEZONE);

function scriptRespondsTo($functionName){
	$functions = get_defined_functions();
	$udf = $functions['user'];

	return in_array(strtolower($functionName), $udf);
}

?>