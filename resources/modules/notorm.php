<?php

function exists($table, $wheres) {
	return $table->where($wheres)->count('1') > 0;
}
?>