<?php
require_once '../functions/functions.php';
require_once '../DB/DB.php';



session_start();
if(!isset($_SESSION['user_id'])){
    http_response_code(403);
    die();
}

$errors = [];
$places_in_route = [];
$db = new DB();


if(isset($_POST['name']) and $_POST['name'] == ''){
    $errors['name'] = 'введите название';
}
if(isset($_POST['distance']) and $_POST['distance'] == ''){
$errors['distance'] = 'Введите дистанцию маршрута';
}
if(isset($_POST['time']) and $_POST['time'] == ''){
$errors['time'] = 'Введите время прогулки';
}

if(isset($_POST['link']) and $_POST['link'] == ''){
$errors['link'] = 'Введите ссылку';
}
if(isset($_POST['img']) and $_POST['img'] == ''){
$errors['img'] = 'Введите путь к картинке';
}


$sql = "SELECT place.id, place.name, routes.id as route_id
FROM place
JOIN routes";
$result = $db->do_query($sql); 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data_place[] = $row;
    }
}
    
$selected_places = $_POST['places'] ?? [];

if (count($_POST) > 4 and isset($_POST['submit_button']) and count($errors) == 0){

    $routes_name = $_POST['name'] ?? null;
    $routes_distance = $_POST['distance'] ?? null;
    $routes_time = $_POST['time'] ?? null; 
    $routes_img = $_POST['img'] ?? null;
    $routes_link = $_POST['link'] ?? null;

    $sql = "INSERT INTO routes (name, distance, time, img, link) VALUES ('$routes_name', '$routes_distance', '$routes_time', '$routes_img' , '$routes_link')"; 


    $result_route = $db -> do_query($sql);
    $sql = "SELECT * FROM routes ORDER BY id DESC LIMIT 1;";
    $result = $db -> do_query($sql);
    if ($result->num_rows>0){
        $row = $result -> fetch_assoc();
    }
    if (!empty($selected_places)) {
        $values = [];
        $id_route=$row['id'];
        foreach ($selected_places as $place_id) {
            $values[] = "($id_route, $place_id)";
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
echo include_template('template_create_routes.php' , 
['errors' => $errors,
'data_place' => $data_place,
'errors' =>$errors]);
?>