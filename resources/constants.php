<?php
//TEMP_USER_EXP_DAYS
//PWDRESET_EXP_DAYS

function GET_CONSTANT($name){
	if(isset($_GLOBAL['CONSTANTS'][$name])){
		return $_GLOBAL['CONSTANTS'][$name];
	}


	$pdo = new PDO(MAINDB, DS_USERNAME, DS_PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sqlString = "
					SELECT value, type
					FROM Constants
					WHERE name = ?
				";

	$statement = $pdo->prepare($sqlString);

	$statement->bindValue(1, $name, PDO::PARAM_STR);
	if(!$statement->execute()){
		trigger_error("Failed to query constant($name)");
		return NULL;
	}

	$result = $statement->fetchAll(PDO::FETCH_ASSOC);

	if(!count($result)){
		trigger_error("No constant exists by the name($name)");
		return NULL;
	}

	$type = $result[0]['type'];
	$value = $result[0]['value'];

	if($type == 'INT'){
		$value = intval($value);
	}

	$_GLOBAL['CONSTANTS'][$name] = $value;

	return $value;
}

?>