<?php

$scope = strtolower($scope) ?: 'all';

if(!in_array($scope, [ 'all', 'temp', 'user' ])){
	$scope = 'all';
}

switch ($scope) {
	case 'all':
		$columns = [ 'U.username', 'TU.username' ];
		$from = [ 'ajrelic_Users.Users U', 'ajrelic_Temp.Users TU' ];
		$where = 'U.username = ? OR TU.username = ?';
	break;

	case 'temp':
		$columns = 'TU.username';
		$from = 'ajrelic_Temp.Users TU'
		$where =  'TU.username = ?';
	break;

	default:
		$columns = 'U.username';
		$from = 'ajrelic_Users.Users U'
		$where = 'U.username = ?';
	break;
}

$query = "	SELECT $columns
			FROM $from
			WHERE $where";

?>