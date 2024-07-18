<?php
require_once '../../DB/DB.php';
require_once '../../functions/functions.php';

$db = new DB();

$sql = "SELECT places_to_routes.place_id, place.name AS place_name, place.img, routes.name as route_name 
FROM places_to_routes
JOIN place ON places_to_routes.place_id = place.id  
JOIN routes ON places_to_routes.route_id = routes.id
WHERE places_to_routes.route_id = 1";

$data = [];
$result = $db->query($sql);
while ($row = $result->fetch_assoc()){
    $data[] = $row;
}


echo include_template("template_way_to_past.php", [
    'data' => $data
])
?>



