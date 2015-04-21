<?php
$container = container();

$container->identifyScript("../vendor/aljcepeda/ORM/services/entitymanager.php");
$container->identifyScript("../vendor/aljcepeda/ORM/services/pdoagent.php");
$container->identifyScript("../vendor/aljcepeda/ORM/services/ormservice.php");

$container->identifyScript("../vendor/aljcepeda/paramhelper/pageparser.php");
$container->identifyScript("../vendor/aljcepeda/paramhelper/defaults/delegates.php");

$container->addRule('autoresolve')
	->resolveForIdentifiers('iParamDelegate')
	->withClass('ParamDelegate');

$container->addRule('autoresolve')
	->resolveForIdentifiers('DatabaseAgent')
	->withClass('PDOAgent');

$container->addRule('autoresolve') 
	->resolveForIdentifiers('PDO')
	->restrictToObjects('UsersManager')
	->withSolution(
		function($identifier, $objectname) { 
			return new PDO(USERSDB, DS_USERNAME, DS_PASSWORD); 
	});

$container->addRule('autoresolve') 
	->resolveForIdentifiers('PDO')
	->restrictToObjects('TempManager')
	->withSolution(
		function($identifier, $objectname) { 
			return new PDO(TEMPDB, DS_USERNAME, DS_PASSWORD); 
	});

$container->identifyObject('PageParser', 'PageParser');
//$container->identifyObject('UsersManager', 'EntityManager');
//$container->identifyObject('TempManager', 'EntityManager');
?>
