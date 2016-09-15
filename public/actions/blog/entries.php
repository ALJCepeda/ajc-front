<?php
require '../../../resources/config.php';
$db = new PDO(PGSQL_ALJCEPEDA);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $db->prepare('SELECT url, title, created FROM blog');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($result);
