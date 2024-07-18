<?php
require_once 'DB/DB.php';
require_once 'functions/functions.php';

$db = new DB();

$sql = "SELECT routes.id, routes.name, routes.img, routes.time, routes.distance, routes.link 
        FROM routes";
        
        
$data=[];
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
}
$data = array_slice($data, 0, 3);
echo include_template("template_main.php", [
    'data' => $data
])
?>



