 <?php
	include filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/startsession.php';
	include ROOT . '/resources/modules/notorm.php';
	use Respect\Validation\Validator;
	use Egulias\EmailValidator\EmailValidator;

	$response = defaultResponse();

	/*
		Validate request
	*/
	$required = ['username','email','g-recaptcha-response'];
	$post = requireInput($required, 'post');
    initGlobalVariables($post, $required);
    
	if(!validRecaptcha($grecaptcharesponse)) {
		respond_error(409, 'recaptcha', 'Whoops looks like you got the recaptcha wrong, please try again', '/user/create' );
		die;
	};

	/*
		Validate parameters
	*/
	$min = GET_CONSTANT('USERNAME_LENGTH_MIN'); 
	$max = GET_CONSTANT('USERNAME_LENGTH_MAX'); 

	if(!Validator::alnum('_')->noWhitespace()->length($min, $max)->validate($username)){
		respond_error(400, 'invalid', "Username is invalid, please try again");
		die;
	}

    if(!(new EmailValidator)->isValid($email)) {
    	respond_error(400, 'invalid', "Email is invalid, please try again");
   		die;
	}

	/*
		Check if email or username is being used
	*/
	$accounts = $container->get('AccountsDB');
	$users = $accounts->Users();
	$emails = $accounts->Emails();

	$temp = $container->get('TempDB');
	$tempUsers = $temp->UserConfirmation();

	if(exists($accounts, 'Users', ['username' => $username]) || exists($temp, 'UserConfirmation', ['username' => $username])){
		respond_error(409, 'duplicate', "`$username` is already in use, please choose a different username", '/user/create');
		die;
	}

	if(exists($accounts, 'Emails', ['email' => $email]) || exists($temp, 'EmailConfirmation', ['email' => $email])) {
		respond_error(409, 'duplicate', "`$email` is already in use, please choose a different email", '/user/create');
		die;
	}

	//Generate the rest of the data for registration
	$confirmationKey = md5(uniqid());
	$expDays = GET_CONSTANT('TEMP_USER_EXP_DAYS'); 
	$date = strtotime("+ $expDays days");
	$expiresOn = Date('Y-m-d H:i:s', $date);
	$expiresOn_US = Date('d F Y H:i:s', $date);

	//Generate confirmation link
	$payload = [ 'username' => $username, 'confirmationKey' => $confirmationKey, 'email' => $email ];
	$encode = base64_encode(json_encode($payload));
	$confirmationLink = DOMAIN . "/user/confirm?p=$encode";

	//Grab email template and replace parameters with values
	$staticContent = file_get_contents(EMAILTEMPLATES . '/confirmation/tempuser');

	$search = ['{{expiresOn}}', '{{confirmationLink}}', '{{username}}', '{{email}}'];
	$replace = [$expiresOn_US, $confirmationLink, $username, $email];

	$staticBody = str_replace($search, $replace, $staticContent);

	//Send email off to registering user
	include ROOT . '/tmp/supportmailer.php';

	$message->From = 'support@aljcepeda.com';
	$message->FromName = 'Support';
	$message->addAddress($email);
	$message->Subject = 'Thank you for registering to ALJCepeda.com!';
	$message->Body = $staticBody;
die;
	
	if(!$message->send()) {
		redirect_error(503, '/user/create', 'internal', "We were unable to send a confirmation email to `$email`. Please try again later", [ $message->ErrorInfo ]);
		die;
	}

	//Email succeeded, save registration information temporarily
	$userRow = $temp->UserConfirmation()
				->insert(['username' => $username,
						'confirmationKey' => $confirmationKey,
						'expiresOn' => $expiresOn]);

	if(!$userRow) {
		$pdo = $container->get('TempPDO');
		throw new Exception('Error during INSERT UserConfirmation: ' . print_r($pdo->errorCode()));
	}

	$emailRow = $temp->EmailConfirmation()
				->insert([  'email' => $email,
							'usersID' => 0 ]);

	if(!$emailRow) {
		$pdo = $container->get('TempPDO');
		$userRow->delete();
		throw new Exception('Error during INSERT EmailConfirmation: ' . print_r($pdo->errorCode()));
	}

	respond_success("Successfully reserved `$username` and sent confirmation email to `$email`. Thank you!");
	die;
?>