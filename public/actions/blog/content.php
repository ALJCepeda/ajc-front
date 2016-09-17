<?php
require '../../../resources/config.php';
$db = new PDO(PGSQL_ALJCEPEDA);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $db->prepare('SELECT title, content FROM blog WHERE url=:url');
$query->execute([ 'url'=>$_GET['url'] ]);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result[0]);
