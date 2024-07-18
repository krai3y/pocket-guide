<?
require_once '../../DB/DB.php';
require_once '../../functions/functions.php';

$db = new DB();
$sql = "SELECT place.id, place.lat, place.lon FROM place 
        JOIN places_to_routes ON places_to_routes.place_id = place.id
        WHERE places_to_routes.route_id=5"; 
$data = [];
$result = $db->query($sql);

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo include_template("way_to_past.php", [
    'data' => $data
])


?>