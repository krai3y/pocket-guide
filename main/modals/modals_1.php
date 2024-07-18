<?
require_once '../DB/DB.php'; 
require_once '../functions/functions.php';

$db = new DB();


$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id) {
    $sql = "SELECT id, name, address, description, lat, lon, big_img_modal FROM place WHERE id = $id";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $place = $result->fetch_assoc();
        include 'templates_modals.php';
    } else {
        echo "<p>Информация о месте не найдена.</p>";
    }
} else {
   
}

?>