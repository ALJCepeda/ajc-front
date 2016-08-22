<?php
require "constants.php";
require "../aljcepeda.php";

require "misc.php";
require VENDOR . "/autoload.php";
require "security/errorhandler.php";

date_default_timezone_set(TIMEZONE);

spl_autoload_register(function($classname) {
	$parts = array_map('strtolower', explode("\\", $classname));
	$parts[0] = $parts[0] . "s";

	$filename = ROOT . "/resources/" . implode("/", $parts) . ".php";
	if(file_exists($filename) === TRUE) {
		require $filename;
	}
});
