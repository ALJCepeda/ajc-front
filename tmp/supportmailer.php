<?php

include VENDOR . '/phpmailer/phpmailer/PHPMailerAutoload.php';
$message = new PHPMailer;
$message->isSMTP();
$message->Host = SMTPHOST;
$message->Port = SMTPPORT;
$message->Username = SUPPORTEMAIL;
$message->Password = SUPPORTPWD;
$message->SMTPAuth = true;
$message->SMTPSecure = 'ssl';
