<?php
error_reporting(-1);

include 'constants.php';
include VENDOR . '/aljcepeda/misc/misc.php';
include 'resources/queryconsts.php';
include VENDOR . '/autoload.php';
include 'aljcepeda.php';

set_error_handler(
	function($errorNum, $errorDetails) {
		echo "</br><pre><code>";
		echo "Error " . $errorNum . ": " . $errorDetails;
		echo "</pre></code>";
	}
);

set_exception_handler(
	function($e){
		echo "</br><pre><code>";
		echo $e;
		echo "</pre></code></br>";
	}
);

date_default_timezone_set(TIMEZONE);

function scriptRespondsTo($functionName){
	$functions = get_defined_functions();
	$udf = $functions['user'];

	return in_array(strtolower($functionName), $udf);
}

?>