<?php
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);
	define('EMAILTEMPLATES', ROOT . '/templates/emails');

	define('HOSTNAME', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME']);
	define('DOMAIN', isset($_SERVER['HTTPS']) ? 'https://' : 'http://' . HOSTNAME);
	define('ISLOCAL', strpos(HOSTNAME, 'aljcepeda.local') !== FALSE);
	define('TIMEZONE', 'America/Los_Angeles');

	define('JWTKEY', '4zJhXxRwPGpQ0t3sB3AW96ZAUsSIOl2l');

	if(ISLOCAL){
		define('HOME', '/Users/alfred');
		define('CONTENT_PROVIDER', 'http://content.aljcepeda.local/bower_components');

		define('DS_USERNAME', 'root');
		define('DS_PASSWORD', 'gooman10');
	} else {
		define('HOME', '/home/ajrelic');
		define('CONTENT_PROVIDER', 'http://content.aljcepeda.com/bower_components');

		define('DS_USERNAME', 'ajrelic_service');
		define('DS_PASSWORD', 'Wyfy!Pixel!175');
	}

	define('VENDOR', HOME . '/vendor');
	define('SQLSERVER', 'mysql:host=localhost;');

	define('MAINDB', SQLSERVER . 'dbname=ajrelic_Main');
	define('SESSIONSDB', SQLSERVER . 'dbname=ajrelic_Sessions');
	define('USERSDB', SQLSERVER . 'dbname=ajrelic_Users');
	define('TEMPDB', SQLSERVER . 'dbname=ajrelic_Temp');
?>