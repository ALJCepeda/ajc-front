<?php
$version = '2.0.0';

if(ISLOCAL === true) {
	$evalURL = 'http://' . $_SERVER['SERVER_NAME'] . ':8002';
} else {
	$evalURL = 'http://' . 'eval.' . $_SERVER['SERVER_NAME'];
}
?>
