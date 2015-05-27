<?php

	include filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/startsession.php';
	$response = [ 'status' => 'success', 'error' => '', 'uri' => DOMAIN . filter_input(INPUT_SERVER, 'REQUEST_URI') ];

	$pageParser = GRAB('PageParser');

	$pageParser->parseGet = false;
	$pageParser->setRequiredAtIndex('username', USERNAME);
	$pageParser->setRequiredAtIndex('authKey', ANYCHARACTER);

	$pageParser->parseRequest();
	$temp = GRAB('TempDB');

	if($temp->exists('Users')->where("username = $username")->and("authKey = $authkey")) {

	}


?>