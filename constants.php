<?php
	define("PROTOCOL", isset($_SERVER["HTTPS"]) ? "https://" : "http://" );
	define("SERVERNAME", PROTOCOL . $_SERVER["SERVER_NAME"]);
	define("HOSTNAME", PROTOCOL . $_SERVER["HTTP_HOST"]);
	define("ISLOCAL", strpos(HOSTNAME, "aljcepeda.com") === FALSE);
	define("ISDEV", strpos(HOSTNAME, "dev.aljcepeda") !== FALSE);

	if(ISLOCAL === true) {
		define("PARENTDIR", "/shared");
		define("ROOT", PARENTDIR . "/aljcepeda");

		define("STATICURL", "http://static.aljcepeda.local");
		define("SNAKEURL", "http://snake.aljcepeda.local");
		define("EVALURL", "http://eval.aljcepeda.local");
	} else {
		define("PARENTDIR", ISDEV ? "/var/dev/" : "/var/www");
		define("ROOT", PARENTDIR . "/aljcepeda");

		define("STATICURL", "http://static.aljcepeda.com");
		define("SNAKEURL", "http://snake.aljcepeda.com");
		define("EVALURL", "http://eval.aljcepeda.com");
	}
	
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