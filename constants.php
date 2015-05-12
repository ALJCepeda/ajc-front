<?php
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);
	define('HOSTNAME', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME']);
	define('DOMAIN', isset($_SERVER['HTTPS']) ? 'https://' : 'http://' . HOSTNAME);

	define('ISLOCAL', strpos(HOSTNAME, 'aljcepeda.local') !== FALSE);

	if(ISLOCAL){
		define('HOME', '/home/vagrant');
		//define('CONTENT_PROVIDER', '../content/bower_components');
		define('JWTKEY', '4zJhXxRwPGpQ0t3sB3AW96ZAUsSIOl2l');

		define('DS_USERNAME', 'root');
		define('DS_PASSWORD', 'password');
	} else {
		define('HOME', '/home/ajrelic');
		
	}

	define('CONTENT_PROVIDER', 'http://content.aljcepeda.com/bower_components');
	define('VENDOR', HOME . '/vendor');
	define('SQLSERVER', 'mysql:host=localhost;');

	define('MAINDB', SQLSERVER . 'dbname=ajrelic_Main');
	define('SESSIONSDB', SQLSERVER . 'dbname=ajrelic_Sessions');
	define('USERSDB', SQLSERVER . 'dbname=ajrelic_Users');
	define('TEMPDB', SQLSERVER . 'dbname=ajrelic_Temp');

	define('EMAILTEMPLATES', ROOT . '/templates/emails');
	define('TIMEZONE', 'America/Los_Angeles');
	$TIMEZONE = new DateTimeZone('America/Los_Angeles');
?>