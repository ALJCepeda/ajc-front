<?php
//TEMP_USER_EXP_DAYS
//PWDRESET_EXP_DAYS

function GET_CONSTANT($name){
	if(isset($_GLOBAL['CONSTANTS'][$name])){
		return $_GLOBAL['CONSTANTS'][$name];
	}

	$main = GRAB('MainDB');

	$main->search('Constants', 'value', 'datatype')
		 ->where("name = $name")->go();

	$result = $main->result;

	if(!count($result)){
		trigger_error("No constant exists by the name($name)");
		return NULL;
	}

	$type = $result[0]['datatype'];
	$value = $result[0]['value'];

	if($type == 'INT'){
		$value = intval($value);
	}

	$_GLOBAL['CONSTANTS'][$name] = $value;

	return $value;
}

?>