<?php
require_once '../functions/functions.php';
require_once '../DB/DB.php';

session_start();
if(!isset($_SESSION['user_id'])){
    http_response_code(403);
    die();
}
$errors = [];
$data_route = [];
$errors = [];
$data_place = [];
$places_in_route = [];
$db = new DB();

$id = $_GET['id'];
$sql = "SELECT routes.id, routes.name, routes.distance, routes.time, routes.img, routes.link FROM routes WHERE routes.id=$id;";
$result = $db->do_query($sql); 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data_route[] = $row;
    }
}

$sql = "SELECT places_to_routes.place_id FROM places_to_routes WHERE places_to_routes.route_id=$id;";
$result = $db->do_query($sql); 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $places_in_route[] = $row;
    }
}

$all_place_ids_in_route = array_column($places_in_route, 'place_id');

$sql = "SELECT place.id, place.name FROM place";
$result = $db->do_query($sql); 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data_place[] = $row;
    }
}

    
$selected_places = $_POST['places'] ?? [];
$place_ids_to_delete = array_diff($all_place_ids_in_route, $selected_places);
$place_ids_to_add = array_diff($selected_places, $all_place_ids_in_route);

if (count($_POST) > -1 and isset($_POST['submit_button'])){
    $id_routes = $_GET['id'];
    $routes_name = $_POST['name'] ?? null;
    $routes_distance = $_POST['distance'] ?? null;
    $routes_time = $_POST['time'] ?? null; 
    $routes_img = $_POST['img'] ?? null;
    $routes_link = $_POST['link'] ?? null;


    $sql = "UPDATE routes SET "; 

    if($routes_name !== null) $sql .= "name = '$routes_name', ";
    if($routes_distance !== null) $sql .= "distance = '$routes_distance', ";
    if($routes_time !== null) $sql .= "time = '$routes_time', ";
    if($routes_img !== null) $sql .= "img = '$routes_img', ";
    if($routes_link !== null) $sql .= "link = '$routes_link', ";



    $sql = rtrim($sql, ', ');
    $sql .= " WHERE id = $id_routes;";


    $result_route = $db -> do_query($sql);

    if (!empty($place_ids_to_delete)) {
        $place_ids_to_delete_str = implode(',', array_map('intval', $place_ids_to_delete));
        $delete_query = "DELETE FROM places_to_routes WHERE place_id IN ($place_ids_to_delete_str) AND route_id = $id";
        $result_place = $db -> do_query($delete_query);
    }
    if (!empty($place_ids_to_add)) {
        $values = [];
        foreach ($place_ids_to_add as $place_id) {
            $values[] = "($id_routes, $place_id)";
        }
        $values_str = implode(', ', $values);
        $insert_query = "INSERT INTO places_to_routes (route_id, place_id) VALUES $values_str;";
        $result_place = $db -> do_query($insert_query);
    }

    // $servername = "localhost";
    // $username = "sergeikw_diplom";
    // $password = "Diplom123";
    // $dbname = "sergeikw_diplom";

    // $conn = new mysqli($servername, $username, $password, $dbname);

    // $result = $conn->query($sql);
    // $conn->close();
    // $result = $db->do_query($sql);
    if ($result_route or $result_place) {
        header('Location: ../routes/index.php');
        exit();
    }


}
echo include_template('template_change_routes.php' , 
['data_route' => $data_route,
'all_place_ids_in_route' => $all_place_ids_in_route,
'data_place' => $data_place]);
?>