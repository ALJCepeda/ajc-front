<?php
error_reporting(-1);

include 'vendor/autoload.php';
include 'resources/constants.php';

define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("EMAILTEMPLATES", ROOT . "/templates/emails");

define("HOSTNAME", isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME']);
define("DOMAIN", isset($_SERVER['HTTPS']) ? 'https://' : 'http://' . HOSTNAME);
define("ISLOCAL", strpos(HOSTNAME, 'aljcepeda.local') !== FALSE);
define("TIMEZONE", "America/Los_Angeles");

if(ISLOCAL){
	define("JWTKEY", '4zJhXxRwPGpQ0t3sB3AW96ZAUsSIOl2l');
	define("DS_USERNAME", "root");
	define("DS_PASSWORD", "password");
} else {
	//Add sensitive production informaiton here
}

define("SQLSERVER", "mysql:host=localhost;");

define("MAINDB", SQLSERVER . "dbname=ajrelic_Main");
define("SESSIONSDB", SQLSERVER . "dbname=ajrelic_Sessions");
define("USERSDB", SQLSERVER . "dbname=ajrelic_Users");
define("TEMPDB", SQLSERVER . "dbname=ajrelic_Temp");

$TIMEZONE = new DateTimeZone('America/Los_Angeles');

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