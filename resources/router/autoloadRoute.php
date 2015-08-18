<?php
$route = $parameters['_route'];


//Location dependant information
$title = isset($parameters['title']) ? $parameters['title'] : 'ALJCepeda';

//Load Location
if(isset($parameters['script'])) {
	//Script location provided by route
	$script = $parameters['script'];
} else {
	//Attempt to autoload script
	if(file_exists("views/$route.html")) 
		$script = "views/$route.html";
	else if(file_exists("views/$route.php"))
		$script = "views/$route.php";
	else {
		//Could not identify route. 404 error will be displayed
		header('HTTP/2.0 404 Not Found');
		$parameters = $matcher->match('/error/404');
	}
}

$stylesheetURL = "assets/css/pages/$route.css";
$stylesheet = "<link rel='stylesheet' type='text/css' href='$stylesheetURL'>\n";
if(!file_exists(ROOT . "/public/$stylesheetURL")) $stylesheet = '';

//Location dependant javascript files
$javascripts = '';
if(isset($parameters['js'])) {
	foreach ($parameters['js'] as $script) {
		$javascripts .= "<script src='$script'></script>\n";
	} 
}

//Location dependant stylesheet files
$stylesheets = '';
if(isset($parameters['css'])) {
	foreach ($parameters['css'] as $sheet) {
		$stylesheets .= "<link rel='stylesheet' type='text/css' href='assets/css/$sheet'>\n";
	}
}

//Location dependant external dependencies
$externals = '';
if(isset($parameters['require'])) {
	foreach ($parameters['require'] as $name) {
		switch ($name) {
			case 'recaptcha':
				$externals .= "<script src='https://www.google.com/recaptcha/api.js'></script>\n";
			break;
		}
	}
}
