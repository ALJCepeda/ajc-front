<?php
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);
	define('HOSTNAME', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME']);
	define('ISLOCAL', strpos(HOSTNAME, 'aljcepeda.com') === FALSE);

	if(ISLOCAL){
		define('DOMAIN', HOSTNAME);
		define('HOME', '/home/vagrant');
		define('JWTKEY', '4zJhXxRwPGpQ0t3sB3AW96ZAUsSIOl2l');

		define('DS_USERNAME', 'root');
		define('DS_PASSWORD', 'password');
	} else {
		define('DOMAIN', isset($_SERVER['HTTPS']) ? 'https://' : 'http://' . HOSTNAME);
		define('HOME', '/home/ajrelic');
		
	}

	define('CONTENT_PROVIDER', 'http://content.aljcepeda.com/bower_components');
	define('VENDOR', HOME . '/vendor');
	define('SQLSERVER', 'mysql:host=localhost;');

	define('MAINDB', SQLSERVER . 'dbname=ajrelic_Main');
	define('SESSIONSDB', SQLSERVER . 'dbname=ajrelic_Sessions');
	define('USERSDB', SQLSERVER . 'dbname=ajrelic_Users');
	define('TEMPDB', SQLSERVER . 'dbname=ajrelic_Temp');

	define('EMAILTEMPLATES', ROOT . '/resources/templates/emails');
	define('TIMEZONE', 'America/Los_Angeles');
	$TIMEZONE = new DateTimeZone('America/Los_Angeles');

	define('RECAPTCHAURL', 'https://www.google.com/recaptcha/api/siteverify');
?>