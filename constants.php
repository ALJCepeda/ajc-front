<?php
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);
	define('HOSTNAME', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME']);
	define('ISLOCAL', strpos(HOSTNAME, 'aljcepeda.com') === FALSE);

	define('DOMAIN', isset($_SERVER['HTTPS']) ? 'https://' : 'http://' . HOSTNAME);
	if(ISLOCAL){
		define('HOME', '/home/vagrant');

		define('DS_USERNAME', 'root');
		define('DS_PASSWORD', 'password');
	} else {
		
		define('HOME', '/home/ajrelic');
		
	}

	define('CONTENT_PROVIDER', 'http://content.aljcepeda.com/bower_components');
	define('VENDOR', HOME . '/vendor');
	define('SQLSERVER', 'mysql:host=localhost;');

	define('SERVERDB', SQLSERVER . 'dbname=ajrelic_Server');
	define('SESSIONSDB', SQLSERVER . 'dbname=ajrelic_Sessions');
	define('ACCOUNTSDB', SQLSERVER . 'dbname=ajrelic_Accounts');
	define('TEMPDB', SQLSERVER . 'dbname=ajrelic_Temp');

	define('EMAILTEMPLATES', ROOT . '/resources/templates/emails');
	define('TIMEZONE', 'America/Los_Angeles');
	$TIMEZONE = new DateTimeZone('America/Los_Angeles');

	define('RECAPTCHAURL', 'https://www.google.com/recaptcha/api/siteverify');
?>