<?php
require_once '../DB/DB.php';
require_once '../functions/functions.php';
$db = new DB();
$sql = "SELECT place.id, place.name, place.img, place.filter FROM place"; 

$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}


echo include_template("template_place.php", [
    'data' => $data
])
?>



