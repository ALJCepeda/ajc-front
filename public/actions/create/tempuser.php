<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/startsession.php';
	include ROOT . '/resources/modules/notorm.php';
	use Respect\Validation\Validator;
	use Egulias\EmailValidator\EmailValidator;

	$response = defaultResponse();

	/*
		Validate request
	*/
	validateRequest(['username', 'email', 'g-recaptcha-response']);
	validateRecaptcha($grecaptcharesponse);

	/*
		Validate parameters
	*/
	$min = GET_CONSTANT('USERNAME_LENGTH_MIN'); 
	$max = GET_CONSTANT('USERNAME_LENGTH_MAX'); 
	if(!Validator::alnum('_')->noWhitespace()->length($min, $max)->validate($username)){
		response_error(400, 'invalid', "Username is invalid, please try again");
		die;
	};
	
	if(!(new EmailValidator)->isValid($email)) {
    	response_error(400, 'invalid', "Email is invalid, please try again");
   		die;
	}

	/*
		Check if email or username is being used
	*/
	$accounts = $container->get('AccountsDB');
	$users = $accounts->Users();
	$emails = $accounts->Emails();

	$temp = $container->get('TempDB');
	$tempUsers = $temp->Users();

	if(exists($users,['username' => $username]) || exists($tempUsers, ['username' => $username])){
		respond_error(409, 'duplicate', "`$username` has already been reserved, please choose a different username", '/user/create');
		die;
	}

	if(exists($emails,['email' => $email]) || exists($tempUsers, ['email' => $email])) {
		respond_error(409, 'duplicate', "`$email` is already in use, please choose a different email or contact support if this is an error", '/user/create');
		die;
	}

	//Generate the rest of the data for registration
	$authKey = md5(uniqid());
	$expDays = GET_CONSTANT('TEMP_USER_EXP_DAYS'); 
	$expiresOn= Date('Y-m-d H:i:s', strtotime("+ $expDays days"));

	//Generate confirmation link
	$payload = [ 'username' => $username, 'authKey' => $authKey, 'email' => $email ];
	$encode = base64_encode(json_encode($payload));
	$confirmationLink = DOMAIN . "/action/confirm/users.php?p=$encode";
	$confirmationView = DOMAIN . "/user/confirm?p=$encode";

	//Grab email template and replace parameters with values
	$static = file_get_contents(EMAILTEMPLATES . '/confirmation/tempuser');
	$staticHtml = file_get_contents(EMAILTEMPLATES . '/confirmation/tempuser_html');

	$search = ['{{expiresOn}}', '{{confirmationLink}}', '{{confirmationView}}', '{{username}}', '{{email}}'];
	$replace = [$expiresOn, $confirmationLink, $confirmationView, $username, $email];

	$static = str_replace($search, $replace, $static);
	$staticHtml = str_replace($search, $replace, $staticHtml);
	
	//Send email off to registering user
	include ROOT . '/tmp/supportmailer.php';

	$message->From = 'support@aljcepeda.com';
	$message->FromName = 'Support';
	$message->addAddress($email);
	$message->Subject = 'Thank you for registering to ALJCepeda.com!';
	$message->Body = $staticHtml;
	$message->AltBody = $static;

	//Message failed for some reason
	if(!$message->send()) {
		redirect_error(503, '/user/create', 'internal', "We were unable to send a confirmation email to `$email`. Please try again later", [ $message->ErrorInfo ]);
		die;
	}

	//Email succeeded, save registration information temporarily
	$tempUsers->insert(['username' => $username,
						'email' => $email,
						'authKey' => $authKey,
						'expiresOn' => $expiresOn]);

	respond_success("Successfully reserved `$username` and sent confirmation email to `$email`");
	die;
?>