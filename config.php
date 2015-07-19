<?php
error_reporting(-1);

include 'aljcepeda.php';
include 'constants.php';
include VENDOR . '/autoload.php';
include VENDOR . '/aljcepeda/misc/misc.php';
include ROOT . '/misc.php';

date_default_timezone_set(TIMEZONE);

function scriptRespondsTo($functionName){
	$functions = get_defined_functions();
	$udf = $functions['user'];

	return in_array(strtolower($functionName), $udf);
}

?>