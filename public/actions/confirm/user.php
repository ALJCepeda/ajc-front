<?php
	include filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/startsession.php';
	include ROOT . '/resources/modules/notorm.php';
	use Respect\Validation\Validator;
	use Egulias\EmailValidator\EmailValidator;

	$response = defaultResponse();

	/*
		Validate request
		p stands for payload and is a single letter identifier for encoded data
	*/
	validateRequest(['p']);
	
	/* Validate payload */
	$payload = base64_decode($p);
	$missing = array_diff(['username', 'email', 'authKey'], array_keys($payload));

	$required = ['username','email','g-recaptcha-response'];
    if(count(array_diff($required, array_keys($payload)))) {
    	//We don't redirect here because this isn't an error a user should encounter
        redirect_error(400, '', 'request', 'Invalid request, malformed \'p\' parameter');
        die;
    }

    $temp = $container->get('TempDB');
	$tempUsers = $temp->Users();

	$row = $temp->select('ID')->where([
								'username' => $payload['username'],
								'email' => $payload['email'],
								'authKey' => $payload['authKey']
								]);

	dump_var($row);

?>