<?php
	include filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/startsession.php';
	include ROOT . '/resources/modules/notorm.php';

	$response = defaultResponse();

	/*
		Validate request
		p stands for payload and is a single letter identifier for encoded data
	*/
	$get = requireInput(['p'], 'get');
	
	/* Validate payload */
	$p = json_decode(base64_decode($get['p']), true);
	$required = ['username', 'confirmationKey', 'email'];

	$payload = requireInput($required, $p,
		function /*onMissing*/($missing) {
        	respond_error(400, 'request', 'Invalid request, malformed \'p\' parameter');
        	die;
	});
	initGlobalVariables($payload, $required);
    $temp = $container->get('TempDB');

	$row = $temp->select('ID')->where([
								'username' => $payload['username'],
								'email' => $payload['email'],
								'authKey' => $payload['authKey']
								]);

	dump_var($row);

?>