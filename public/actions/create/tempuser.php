<?php
	header('Location: /', true, 301);
	die;
	
	require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	require($_SERVER['DOCUMENT_ROOT'] . '/classes/TemplateEmailer.php');

	include $_SERVER['DOCUMENT_ROOT'] . '/vendor/swiftmailer/swiftmailer/lib/swift_required.php';

	$pageParser = GRAB('PageParser');

	$pageParser->setRequiredAtIndex('username', USERNAME);
	$pageParser->setRequiredAtIndex('email', EMAIL);
	$pageParser->parseRequest();

	$users = GRAB('UsersManager');
	$temp = GRAB('TempManager');

	if($users->exists('Users', "username = $username") || $temp->exists('Users', "username = $username")){
		echo "The username($username) has already been taken";
		die;
	}

	if($users->exists('Emails', "local = $email") || $temp->exists('Users', "email = $email")) {
		echo "The email($email) has already been used to register an account";
		die;
	}

	$authKey = md5(uniqid(rand(), true));
	$expDays = GET_CONSTANT("TEMP_USER_EXP_DAYS"); 
	$expiresOn= Date('Y/m/d', strtotime("+ $expDays days"));

	$insert = [ 'username' => $username,
				'email' => $email,
				'authKey' => $authKey,
				'expiresOn' => $expiresOn ];

	var_dump($inset);
	die;
	$temp->insert('Users', $insert);

	//Generate confirmation link
	$confirmationLink = DOMAIN . "/action/confirm/users.php?username={{username}}&authKey={{authKey}}";
	$search = [ '{{username}}', '{{authKey}}' ];
	$replace = [ $username, $authKey ];
	$confirmationLink = str_replace($search, $replace, $confirmationLink);

	//Send email
	$emailer = new TemplateEmailer($email, 'support', EMAILTEMPLATES . "/confirmation/user.txt");
	$emailer->replace = [ 'username' => $username, 'confirmationLink' => $confirmationLink, 'expiresOn' => $expDate ];
	$emailer->generateEmail();
	$emailer->sendEmail();

/*
	echo "Succesfully reserved username: " . $username . " and sent confirmation email to " . $email;

	function onEmailError($e){
		global $username, $email, $pdo;

		$sqlString = "
						DELETE FROM Users
						WHERE 
							username = ?
							AND email = ?
					";
		$statement = $pdo->prepare($sqlString);

		$statement->bindValue(1, $username, PDO::PARAM_STR);
		$statement->bindValue(2, $email, PDO::PARAM_STR);
		$statement->execute();

		echo "Sorry we were unable to send a confirmation email for: " . $email . "</br>";
		echo "Please try again later";
		die;
	}*/
?>