<?php
require '../../../resources/config.php';
$url = $_GET['url'];
$db = new PDO(PGSQL_ALJCEPEDA);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $db->prepare('SELECT title, content FROM blog WHERE url=:url');
$query->execute([ 'url'=>$url ]);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
if(count($result) === 0) {
    echo json_encode([ 'error' => 'Unable to find content for: ' . $url ]);
} else {
    echo json_encode($result[0]);
}
