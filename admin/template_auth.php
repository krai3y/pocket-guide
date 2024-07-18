<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Регистрация</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script defer src="../js/bootstrap.bundle.min.js"></script>
</head>

<body>
<form action="" method="post">
<div class="content-wrap" style="padding-top: 10%;">
    <div class="border card w-50 mx-auto">
        <h1 class="text-h text-center mt-5 color-blue">Авторизация</h1>
        <input type="text" placeholder="Логин" name="login" class="form-control fs-5 my-4 w-50 mx-auto rounded-pill auth-height" value="<?= $_POST['login'] ?? '' ?>" aria-describedby="inputGroup-sizing-lg" >
        <span class="form__error"><?= $errors['login'] ?></span>
        <input type="password" placeholder="Пароль" id="inputPassword5" name="pass" class="form-control fs-5 mb-4 w-50 mx-auto rounded-pill auth-height" value="<?= $_POST['pass'] ?? '' ?>" aria-describedby="passwordHelpBlock">
        <span class="form__error"><?= $errors['pass'] ?></span>
        <input type="submit" name="submit_button" class="btn btn-index fs-5 mx-auto py-sm-3 rounded-pill mb-5 w-50" value="Войти">
    </div>
</div>
</form>
</body>

</html>