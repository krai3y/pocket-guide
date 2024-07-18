<?php
require_once '../functions/functions.php';
require_once '../DB/DB.php';
session_start();
if(!isset($_SESSION['user_id'])){
    http_response_code(403);
    die();
}
$db = new DB();
$sql = "SELECT place.id, place.name, place.img FROM place"; 

$result = $db->do_query($sql);
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}


echo include_template("template_places.php", [
    'data' => $data
]);

