<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Маршруты</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script defer src="../js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php $activePage = 'c_routes';
    include '../header.php'; ?>
    <div class="content-wrap">
        <form method="post">
        <h1 class="text-h text-center mt-5">Создание маршрута</h1>
        <div class="container mt-3 text-center">
            <p class="text">Название</p>
            <input type="text" name="name" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <span><?=$errors['name']?></span>
            <p class="text">Дистанция</p>
            <input type="text" name="distance" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <span><?=$errors['distance']?></span>
            <p class="text">Время прохождения</p>
            <input type="text" name="time" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <span><?=$errors['time']?></span>
            <p class="text">Картинка</p>
            <input type="text" name="img" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <span><?=$errors['img']?></span>
            <p class="text">Ссылка</p>
            <input type="text" name="link" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <span><?=$errors['link']?></span>
            <p class="text">Места</p>
            <div class="overflow-auto bg-light">
                <div class="list-group flex-row text-about">
                <? foreach ($data_place as $place): ?>
                    <label class="list-group-item">
                        <input class="form-check-input" type="checkbox" <?=in_array($place['id'], $all_place_ids_in_route) ? 'checked' : ''?> name="places[]" value="<?=$_POST['id'] ?? $place['id']?>">
                        <br><?=$place['name']?>
                    </label>
                <? endforeach; ?> 
                    <!-- <label class="list-group-item">
                        <input class="form-check-input" type="checkbox" value="">
                        Памятник Юнгам Северного флота
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input" type="checkbox" value="">
                        Third checkbox
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input" type="checkbox" value="">
                        Fourth checkbox
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Fifth checkbox
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Fifth checkbox
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Fifth checkbox
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Fifth checkbox
                    </label><label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Fifth checkbox
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Fifth checkbox
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Fifth checkbox
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Fifth checkbox
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Fifth checkbox
                    </label> -->
                </div>
            </div>
            <button type="submit" name="submit_button" class="btn btn-index fs-5 py-3 px-5 rounded-pill mx-auto mt-3 mb-5 w-25">Добавить</button>
        </div>
        </form>
    </div>
    <? include('../footer.php'); ?>
</body>
</html>