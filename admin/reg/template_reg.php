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
            <div class="position-fixed ms-2 pt-2 mt-4">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                    </svg>
                </a>
            </div>
            <h1 class="text-h text-center mt-5 color-blue">Регистрация</h1>
            <input type="text" placeholder="Логин" name="login" class="form-control fs-5 my-4 w-50 mx-auto rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg" value="<?= $_POST['login'] ?? '' ?>">
            <span class="form__error"><?= $errors['login'] ?></span>
            <input type="password" placeholder="Пароль" id="inputPassword5" name="pass" class="form-control fs-5 mb-4 w-50 mx-auto rounded-pill auth-height"  aria-describedby="passwordHelpBlock" value="<?= $_POST['pass'] ?? '' ?>">
            <input type="submit" name="submit_button" class="btn btn-index fs-5 mx-auto py-sm-3 rounded-pill mb-5 w-50" value="Зарегистрироваться">
            
        </div>
    </div>
</form>
</body>

</html>