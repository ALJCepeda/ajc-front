<?php

include $_SERVER['DOCUMENT_ROOT'] . '/config.php';

//Will redirect user to security fault page and kill script if error is encountered
//Initializes and configures $jwtmanager
include ROOT . '/resources/security/validatesession.php';

//Does final updates to JWT and resets cookie
include ROOT . '/resources/security/updatesession.php';

//Attempts to resolve request path or redirects to 404
//Provides $parameters for page
include ROOT . '/resources/routerequest.php';

//Check if user encountered an error
if(!isset($parameters['error'])){
	//If user was redirected to an error page then there's no reason to set up dependencies
	include VENDOR . '/aljcepeda/dependencycontainer/dependencycontainer.php';

	new ALJCepeda\DependencyContainer\DependencyContainer();

	include ROOT . '/resources/dependencyrules.php';
}

?>