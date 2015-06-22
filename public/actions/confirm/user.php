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
	$required = ['username', 'userConfirmation', 'email', 'emailConfirmation'];

	$payload = requireInput($required, $p,
		function /*onMissing*/($missing) use ($p) {
        	respond_error(400, 'request', 'Invalid request, malformed \'p\' parameter');
        	die;
	});
	initGlobalVariables($payload, $required);

    $temp = $container->get('TempDB');

    $now = Date('Y-m-d H:i:s', time());
	$userRow = $temp->UserConfirmation()
					->where([ 'username' => $username,
							  'confirmationKey' => $userConfirmation] )
					->where('expiresOn > ?', $now)
					->select('*');

	$emailRow = $temp->EmailConfirmation()
					 ->where([	'email' => $email, 
								'confirmationKey' => $emailConfirmation] )
					 ->where('expiresOn > ?', $now)
					 ->select('*');
	
	if(!$userRow || !$emailRow) {
		respond_error(400, 'invalid', "Credentials were invalid, please start the registration process over");
		die;
	}

	$password = randomString(12);
	echo $password;
	die;

	$accounts = $container->get('AccountDB');
	$userAccount = $accounts->Users()
			 				->insert([	'username' => $username
			 						]);
	echo "We have a valid user and email confirmation record";
	die;
?>