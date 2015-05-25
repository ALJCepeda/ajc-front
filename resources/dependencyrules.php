<?php


return [
	'TempPDO' => DI\factory(function($c) { return new PDO(TEMPDB, DS_USERNAME, DS_PASSWORD); }),
	'ServerPDO' => DI\factory(function($c) { return new PDO(SERVERDB, DS_USERNAME, DS_PASSWORD); }),
	'AccountsPDO' => DI\factory(function($c) { return new PDO(ACCOUNTSDB, DS_USERNAME, DS_PASSWORD); }),
	'TempDB' => DI\object('NotORM')->constructor(DI\link('TempPDO')),
	'ServerDB' => DI\object('NotORM')->constructor(DI\link('ServerPDO')),
	'AccountsDB' => DI\object('NotORM')->constructor(DI\link('AccountsPDO'))
];
/*
$container = container();

$container->identifyScript(VENDOR . '/aljcepeda/orm/services/entitymanager.php');
$container->identifyScript(VENDOR . '/aljcepeda/orm/services/pdoagent.php');
$container->identifyScript(VENDOR . '/aljcepeda/orm/services/ormservice.php');
$container->identifyScript(VENDOR . '/aljcepeda/paramhelper/pageparser.php');
$container->identifyScript(VENDOR . '/aljcepeda/paramhelper/defaults/delegates.php');

$container->addRule('autoresolve')
	->resolveForIdentifiers('iParamDelegate')
	->withClass('ParamDelegate');

$container->addRule('autoresolve')
	->resolveForIdentifiers('DatabaseAgent')
	->withClass('PDOAgent');

$container->addRule('autoresolve') 
	->resolveForIdentifiers('PDO')
	->restrictToObjects('UsersDB')
	->withSolution(
		function($identifier, $objectname) { 
			return new PDO(USERSDB, DS_USERNAME, DS_PASSWORD); 
	});

$container->addRule('autoresolve') 
	->resolveForIdentifiers('PDO')
	->restrictToObjects('TempDB')
	->withSolution(
		function($identifier, $objectname) { 
			return new PDO(TEMPDB, DS_USERNAME, DS_PASSWORD); 
	});

$container->addRule('autoresolve') 
	->resolveForIdentifiers('PDO')
	->restrictToObjects('MainDB')
	->withSolution(
		function($identifier, $objectname) { 
			return new PDO(MAINDB, DS_USERNAME, DS_PASSWORD); 
	});

$container->identifyObject('PageParser', 'PageParser');
$container->identifyObject('UsersDB', 'EntityManager');
$container->identifyObject('TempDB', 'EntityManager');
$container->identifyObject('MainDB', 'EntityManager');
*/
?>
