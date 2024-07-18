<?php
require_once '../functions/functions.php';
require_once '../DB/DB.php';

session_start();
if(!isset($_SESSION['user_id'])){
    http_response_code(403);
    die();
}
$errors = [];
$data = [];
$db = new DB();

$id = $_GET['id'];
$sql = "SELECT  place.id, place.name, place.lon, place.lat, place.address, place.description, place.img, place.big_img_modal, place.filter FROM place
    WHERE place.id=$id;";
$result = $db -> do_query($sql); 
if ($result -> num_rows > 0){
    while ($row = $result -> fetch_assoc()){
        $data[] = $row;
    }
}

if(isset($_POST['name']) and $_POST['name'] == ''){
        $errors['name'] = 'введите название';
}
if(isset($_POST['lat']) and $_POST['lat'] == ''){
    $errors['lat'] = 'Введите долготу';
}
if(isset($_POST['lon']) and $_POST['lon'] == ''){
    $errors['lon'] = 'Введите широту';
}
if(isset($_POST['lon']) and $_POST['description'] == ''){
    $errors['lon'] = 'Введите широту';
}
if(isset($_POST['description']) and $_POST['description'] == ''){
    $errors['description'] = 'Введите описание';
}
if(isset($_POST['img']) and $_POST['img'] == ''){
    $errors['img'] = 'Введите путь к картинке';
}
if(isset($_POST['big_img_modal']) and $_POST['big_img_modal'] == ''){
    $errors['big_img_modal'] = 'Введите путь к модалке';
}
if(isset($_POST['filter']) and $_POST['filter'] == ''){
    $errors['filter'] = 'Введите тип места';
}
if (count($_POST) > 4 && isset($_POST['submit_button']) && count($errors) == 0){
    $id_place = $_GET['id'];
    $place_name = $_POST['name'] ?? null;
    $place_address = $_POST['address'] ?? null;
    $place_lat = $_POST['lat'] ?? null; 
    $place_lon = $_POST['lon'] ?? null;
    $place_description = $_POST['description'] ?? null;
    $place_img = $_POST['img'] ?? null;
    $place_big_img_modal = $_POST['big_img_modal'] ?? null;
    $place_filter = $_POST['filter'] ?? null;

    $sql = "UPDATE place SET "; 

    if($place_name !== null) $sql .= "name = '$place_name', ";
    if($place_address !== null) $sql .= "address = '$place_address', ";
    if($place_lat !== null) $sql .= "lat = '$place_lat', ";
    if($place_lon !== null) $sql .= "lon = '$place_lon', ";
    if($place_description !== null) $sql .= "description = '$place_description', ";
    if($place_img !== null) $sql .= "img = '$place_img', ";
    if($place_big_img_modal !== null) $sql .= "big_img_modal = '$place_big_img_modal', ";
    if($place_filter !== null) $sql .= "filter = '$place_filter', ";


    $sql = rtrim($sql, ', ');

    $sql .= " WHERE id = $id_place;";
    // $servername = "localhost";
    // $username = "sergeikw_diplom";
    // $latword = "Diplom123";
    // $dbname = "sergeikw_diplom";

    // $conn = new mysqli($servername, $username, $latword, $dbname);

    // $result = $conn->query($sql);
    // $conn->close();
    $result = $db->do_query($sql);
    if ($result) {
        header('Location: ../places/index.php');
        exit();
    }


}
echo include_template('template_change_places.php' , [
    'data' => $data, 
    'errors' => $errors
]);
?>