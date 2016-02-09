<?php
	//Does all preprocessing such as providing dependencies, constants and refreshes session
	require $_SERVER["DOCUMENT_ROOT"] . "/../startsession.php";

	if(!isset($_SESSION["portfolio"], $_GET["section"])) {
		throw new Exception("Page fault!");
	}

	$section = filter_input(INPUT_GET, "section");
	if(in_array($section, [ 
		"projections", 
		"repair", 
		"terror",
		"interest",
		"other"
	]) === FALSE) {
		throw new Exception("Page fault!");
	}

	if(isset($_POST["image"])) {
		$_SESSION["portfolio"][$section]["image"] = $_POST["image"];
	} else if(isset($_POST["question"])) {
		$_SESSION["portfolio"][$section]["question"] = $_POST["question"];
	} else {
		throw new Exception("Page fault!");
	}

	header("Location: /portfolio");
	die();