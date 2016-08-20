<?php
	define('ROOT', '/var/www/aljcepeda');

	if(getenv('ENVIRONMENT') === 'local') {
		define('ISLOCAL', true);
	} else {
		define('ISLOCAL', false);
	}

	define('VENDOR', ROOT . '/vendor');
	define('ASSETS', ROOT . 'public/assets');

	define('SQLSERVER', 'mysql:host=localhost;');
	define('SERVERDB', SQLSERVER . 'dbname=ajrelic_Server');
	define('SESSIONSDB', SQLSERVER . 'dbname=ajrelic_Sessions');
	define('ACCOUNTSDB', SQLSERVER . 'dbname=ajrelic_Accounts');
	define('TEMPDB', SQLSERVER . 'dbname=ajrelic_Temp');

	define('EMAILTEMPLATES', ROOT . '/resources/templates/emails');
	define('TIMEZONE', 'America/Los_Angeles');
	$TIMEZONE = new DateTimeZone('America/Los_Angeles');

	define('RECAPTCHAURL', 'https://www.google.com/recaptcha/api/siteverify');
