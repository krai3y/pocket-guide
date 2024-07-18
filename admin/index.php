<?
require_once 'DB/DB.php';
require_once 'functions/functions.php';
session_start();


// array vars
$errors = [];

$db = new DB();



//validate form
if(isset($_POST['login'])){
    if($_POST['login'] == ''){
        $errors['login'] = 'Введите логин';
    }else{
        // check is it login
        $login = $_POST['login'];
    }
}
if(isset($_POST['pass']) and $_POST['pass'] == ''){
    $errors['pass'] = 'Введите пароль';
}

//auth user
if(count($errors) == 0 and count($_POST) > 0){
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM user WHERE login = '$login'";
    $result = $db->do_query($sql);
    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if (!password_verify($pass, $user['pass'])){
            $errors['pass'] = 'Вы ввели неверный пароль';
        }
    }else{
        $errors['login'] = 'Вы ввели неверный login';
    }

    if(count($errors) == 0){
        $_SESSION['user_id'] = $user['id'] ?? '';
        header('Location: /places/');
        exit();
    }

}

echo include_template("template_auth.php", ['errors' => $errors ])
?>