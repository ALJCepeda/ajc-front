<?php
	define("PROTOCOL", isset($_SERVER["HTTPS"]) ? "https://" : "http://" );
	define("SERVERNAME", PROTOCOL . $_SERVER["SERVER_NAME"]);
	define("HOSTNAME", PROTOCOL . $_SERVER["HTTP_HOST"]);
	define("ROOT", "/var/www/aljcepeda");

	define('VENDOR', ROOT . '/vendor');
	define("ASSETS", ROOT . "public/assets");
	define("BOWER", ROOT . "public/bower_components");

	define("SQLSERVER", "mysql:host=localhost;");
	define("SERVERDB", SQLSERVER . "dbname=ajrelic_Server");
	define("SESSIONSDB", SQLSERVER . "dbname=ajrelic_Sessions");
	define("ACCOUNTSDB", SQLSERVER . "dbname=ajrelic_Accounts");
	define("TEMPDB", SQLSERVER . "dbname=ajrelic_Temp");

	define("EMAILTEMPLATES", ROOT . "/resources/templates/emails");
	define("TIMEZONE", "America/Los_Angeles");
	$TIMEZONE = new DateTimeZone("America/Los_Angeles");

	define("RECAPTCHAURL", "https://www.google.com/recaptcha/api/siteverify");
