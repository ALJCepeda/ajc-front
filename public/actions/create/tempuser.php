<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/startsession.php';
	$response = [ 'status' => 'success', 'request' => $_REQUEST ];
	
	$pageParser = GRAB('PageParser');

	$pageParser->setRequiredAtIndex('username', USERNAME);
	$pageParser->setRequiredAtIndex('email', EMAIL);
	$pageParser->parseRequest(); 

	$users = GRAB('UsersDB');
	$temp = GRAB('TempDB');

	if($users->exists('Users', "username = $username") || $temp->exists('Users', "username = $username")){
		http_response_code(409);
		$response['status'] = 'failed';
		$response['error'] = [ 'type' => 'duplicate', 'message' => "The username($username) has already been reserved" ];
		echo json_encode($response);
		die;
	}

	if($users->exists('Emails', "local = $email") || $temp->exists('Users', "email = $email")) {
		http_response_code(409);
		$response['status'] = 'failed';
		$response['error'] = [ 'type' => 'duplicate', 'message' => "The email($email) has already been reserver" ];
		echo json_encode($response);
		die;
	}

	$authKey = md5(uniqid());
	$expDays = GET_CONSTANT('TEMP_USER_EXP_DAYS'); 
	$expiresOn= Date('Y/m/d', strtotime("+ $expDays days"));

	//Generate confirmation link
	$confirmationLink = DOMAIN . '/action/confirm/users.php?username={{username}}&authKey={{authKey}}';
	$search = [ '{{username}}', '{{authKey}}' ];
	$replace = [ $username, $authKey ];
	$confirmationLink = str_replace($search, $replace, $confirmationLink);

	$static = file_get_contents(EMAILTEMPLATES . '/confirmation/tempuser.txt');
	$search = array_merge($search, [ '{{expiresOn}}', '{{confirmationLink}}']);
	$replace = array_merge($replace, [ $expiresOn, $confirmationLink ]);
	$static = str_replace($search, $replace, $static);

	include VENDOR . '/phpmailer/phpmailer/PHPMailerAutoload.php';
	$message = new PHPMailer;
	$message->isSMTP();
	$message->Host = SMTPHOST;
	$message->Port = SMTPPORT;
	$message->Username = SUPPORTEMAIL;
	$message->Password = SUPPORTPWD;
	$message->SMTPAuth = true;
	$message->SMTPSecure = 'ssl';
	
	$message->From = 'support@aljcepeda.com';
	$message->FromName = 'Support';
	$message->addAddress($email);
	$message->Subject = 'Thank you for registering to ALJCepeda.com!';
	$message->Body = $static;

	if(!$message->send()) {
		http_response_code(503);
		$error = [ 'status' => 'failed', 'error' => [ 'type' => 'internal', 'message' => "We were unable to send a confirmation email for: $email. Please try again later.", 'details' => $message->ErrorInfo ]];
		echo json_encode($error);
	} else {
		$insert = [ 'username' => $username,
					'email' => $email,
					'authKey' => $authKey,
					'expiresOn' => $expiresOn ];

		$temp->insert('Users', $insert);

		$success = [ 'status' => 'success', 'message' => "Successfully reserved username($username) and sent confirmation email to $email" ];
		echo json_encode($success);
	}
?>