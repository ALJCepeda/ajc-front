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
	$required = ['username', 'password', 'userConfirmation', 'email', 'emailConfirmation'];

	$payload = requireInput($required, $p,
		function /*onMissing*/($missing) use ($p) {
        	respond_error(400, 'request', 'Invalid request, malformed \'p\' parameter');
        	die;
	});
	initGlobalVariables($payload, $required);

    $temp = $container->get('TempDB');

    $now = Date('Y-m-d H:i:s', time());
	$userRow = $temp->UserConfirmation()
					->select('*')
					->where([ 	'username' => $username,
								'password' => $password,
							  	'confirmationKey' => $userConfirmation] )
					->where('expiresOn > ?', $now)
					->fetch();

	$emailRow = $temp->EmailConfirmation()
					 ->select('*')
					 ->where([	'email' => $email, 
								'confirmationKey' => $emailConfirmation] )
					 ->where('expiresOn > ?', $now)
					 ->fetch();

	if(!$userRow || !$emailRow) {
		respond_error(400, 'invalid', "Credentials were invalid, please start the registration process over");
		die;
	}

	$accounts = $container->get('AccountsDB');
	$userAccount = $accounts->Users()
			 				->insert([	'username' => $username,
			 							'password' => $password ]);

	if(!$userAccount) {
		'Hello';
	}
	$primaryEmail = $accounts->Emails()
							 ->insert([ 'usersID' => $userAccount['id'],
							 			'email' => $email,
							 			'isPrimary' => true 	]);

	$userRow->delete();
	$emailRow->delete();

	echo "We have a valid user and email confirmation record";
	die;
?>