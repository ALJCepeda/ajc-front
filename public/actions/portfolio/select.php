<?php
	//Does all preprocessing such as providing dependencies, constants and refreshes session
	require $_SERVER["DOCUMENT_ROOT"] . "/startsession.php";
	
	var_dump($_SESSION);

	if(!isset($_SESSION['portfolio'])) {
		throw new Exception("Page fault!");
	}

	if(isset($_POST['image'])) {
		$_SESSION['portfolio']['image'] = $_POST['image'];
	} else if(isset($_POST['question'])) {
		$_SESSION['portfolio']['question'] = $_POST['question'];
	} else {
		throw new Exception("Page fault!");
	}