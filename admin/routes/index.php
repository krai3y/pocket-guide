<?php
require_once '../DB/DB.php';
require_once '../functions/functions.php';

session_start();
if(!isset($_SESSION['user_id'])){
    http_response_code(403);
    die();
}
$db = new DB();
$sql = "SELECT routes.id, routes.name, routes.img, routes.time, routes.distance, routes.link FROM routes"; 
$data = [];
$result = $db->do_query($sql);

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo include_template("template_routes.php", [
    'data' => $data
])
?>