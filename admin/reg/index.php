<?php
require_once '../functions/functions.php';
require_once '../DB/DB.php';

session_start();
if(!isset($_SESSION['user_id'])){
    http_response_code(403);
    die();
}

$errors = [];

$db = new DB();





if(isset($_POST['login'])){
    if($_POST['login'] == ''){
        $errors['login'] = 'Введите логин';
    }else{
            $login = $_POST['login'];
            $sql = "SELECT * FROM user WHERE login = '$login'";
            $result = $db->do_query($sql);
            if($result->num_rows > 0){
                $errors['login'] = 'Логин занят';
            }
        }
}
if(isset($_POST['pass']) and $_POST['pass'] == ''){
    $errors['pass'] = 'Введите пароль';
}


if(count($errors) == 0 and count($_POST) > 0){
    $login = $_POST['login'];
    $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $role = 'admin'; 
    $premium = 'none';

    $sql = "INSERT INTO user (login, pass, role, premium) VALUES ('$login', '$pass', '$role', '$premium');";
    $result = $db -> do_query($sql);
}
echo include_template("template_reg.php", ['errors' => $errors]);



