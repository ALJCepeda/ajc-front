<?php
require "constants.php";
require "aljcepeda.php";

define('VENDOR', HOME . '/vendor');

require "misc.php";
require VENDOR . "/autoload.php";
require "resources/security/errorhandler.php";

date_default_timezone_set(TIMEZONE);

spl_autoload_register(function($classname) {
	$parts = explode("\\", $classname);
	$parts[0] = $parts[0] . "s";

	$parts = array_map('strtolower', $parts);
	$filename = ROOT . "/resources/" . implode("/", $parts) . ".php";

	if(file_exists($filename) === TRUE) {
		require $filename;
	}
});