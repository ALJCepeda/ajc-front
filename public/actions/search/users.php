<?php

require($_SERVER['DOCUMENT_ROOT'] . '/config.php');

//If user was redirected to an error page then there's no reason to set up dependencies
include VENDOR . '/aljcepeda/dependencycontainer/dependencycontainer.php';

$container = new ALJCepeda\DependencyContainer\DependencyContainer();

include ROOT . '/resources/dependencyrules.php';


$paramValidator = GRAB('PageParser');

$paramValidator->setRequiredAtIndex('username', USERNAME);
$paramValidator->setOptionalAtIndex('scope', EMAIL);
$paramValidator->parseRequest();

$users = GRAB('UsersManager');
?>