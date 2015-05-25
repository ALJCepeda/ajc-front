<?php

include 'config.php';

//Will redirect user to security fault page and kill script if error is encountered
//Initializes and configures $jwtmanager
include ROOT . '/resources/security/validatesession.php';

//Does final updates to JWT and resets cookie
include ROOT . '/resources/security/updatesession.php';

$builder = new DI\ContainerBuilder();
$builder->addDefinitions(ROOT . '/resources/dependencyrules.php');
$container = $builder->build();

include ROOT . '/resources/dependencyrules.php';


?>