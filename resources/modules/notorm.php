<?php

function exists($db, $tablename, $wheres) {
	$db->exec("COUNT(1) FROM $tablename WHERE ")
	$count = $db->$tablename()->where($wheres)->count('1');
	return $count > 0;
}

function insert($db, $tablename, $data) {
	$table = $db->$tablename();
	$row = $table->insert($data);


	$log = $db->Log();
	$log->insert([	
					'table' => $tablename,
					'pKey' => $row['ID'],
					'column' => 'INSERT',
					'datatype' => 'crud',
					'value' => json_encode($data)
				]);
}


?>