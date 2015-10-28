<?php
$route = $parameters['_route'];

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
		throw new Exception("Could not find route for: $route");
	}
}

//Location dependant information
$title = isset($parameters['title']) ? $parameters['title'] : 'ALJCepeda';

$stylesheetURL = "assets/css/pages/$route.css";
$stylesheet = "<link rel='stylesheet' type='text/css' href='$stylesheetURL'>\n";
if(!file_exists(ROOT . "/public/$stylesheetURL")) $stylesheet = '';

//Location dependant javascript files
$javascripts = '';
if(isset($parameters['js'])) {
	foreach ($parameters['js'] as $script) {
		if(file_exists("assets/js/$script.js")) {
			$javascripts .= "<script src='$script'></script>\n";
		} else {
			throw new Exception("No javascript found for: $script");
		}
	} 
}

//Location dependant stylesheet files
$stylesheets = '';
if(isset($parameters['css'])) {
	foreach ($parameters['css'] as $sheet) {
		if(file_exists("assets/css/$sheet.css")) {
			$stylesheets .= "<link rel='stylesheet' type='text/css' href='assets/css/$sheet.css'>\n";
		} else {
			throw new Exception("No stylesheet found for: $sheet");
		}
	}
}

//Location dependant external dependencies
$requires = '';
if(isset($parameters['require'])) {
	foreach ($parameters['require'] as $name) {
		switch ($name) {
			case 'recaptcha':
				$requires .= "<script src='https://www.google.com/recaptcha/api.js'></script>\n";
			break;
			case 'codemirror':
				$requires .= "<script src='/bower/codemirror/lib/codemirror.js'></script>\n";
				$requires .= "<script src='/bower/codemirror/mode/javascript/javascript.js'></script>\n";
				$requires .= "<link rel='stylesheet' type='text/css' href='/bower/codemirror/lib/codemirror.css'>\n";
			break;
			case 'knockout':
				$requires .= "<script src='/bower/knockout/dist/knockout.js'></script>\n";
			break;

			default:
				throw new Exception("No externally linked dependency for: $name");
			break;
		}
	}
}
