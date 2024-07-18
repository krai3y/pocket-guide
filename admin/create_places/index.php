<?
require_once '../functions/functions.php';
require_once '../DB/DB.php';



session_start();
if(!isset($_SESSION['user_id'])){
    http_response_code(403);
    die();
}
$errors = [];
$db = new DB();




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
    $place_name = $_POST['name'] ?? null;
    $place_address = $_POST['address'] ?? null;
    $place_lat = $_POST['lat'] ?? null; 
    $place_lon = $_POST['lon'] ?? null;
    $place_description = $_POST['description'] ?? null;
    $place_img = $_POST['img'] ?? null;
    $place_big_img_modal = $_POST['big_img_modal'] ?? null;
    $place_filter = $_POST['filter'] ?? null;

    $sql = "INSERT INTO place (name, lat, lon, address, img, big_img_modal, description, filter) VALUES ('$place_name','$place_lat','$place_lon','$place_address','$place_img','$place_big_img_modal','$place_description', '$place_filter');";

    
    $result = $db -> do_query($sql);
    if($result){
        header('Location: ../places/index.php');
        exit;
    }


}
echo include_template('template_create_places.php', ['errors' => $errors])
?>