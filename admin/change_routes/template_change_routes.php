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
    <?php $activePage = 'routes';
    include '../header.php'; ?>
    <div class="content-wrap">
        <form method="post">
        <h1 class="text-h text-center mt-5">Изменение маршрута</h1>
        <p class="text-h text-center"><?=$row['name']?></p>
        <? foreach ($data_route as $row_route): ?>
        <div class="container mt-3 text-center">
            <p class="text">Название</p>
            <input type="text" placeholder="<?=$row_route['name']?>" value="<?=$_POST['name'] ?? $row_route['name']?>" name="name" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <p class="text">Дистанция</p>
            <input type="text" placeholder="<?=$row_route['distance']?>" value="<?=$_POST['distance'] ?? $row_route['distance']?>" name="distance" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <p class="text">Время прохождения</p>
            <input type="text" placeholder="<?=$row_route['time']?>" value="<?=$_POST['time'] ?? $row_route['time']?>" name="time" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <p class="text">Картинка</p>
            <input type="text" placeholder="<?=$row_route['img']?>" value="<?=$_POST['img'] ?? $row_route['img']?>" name="img" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <p class="text">Ссылка</p>
            <input type="text" placeholder="<?=$row_route['link']?>" value="<?=$_POST['link'] ?? $row_route['link']?>" name="link" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <? endforeach; ?>
            <p class="text">Места</p>
            <div class="overflow-auto bg-light">
                <div class="list-group flex-row text-routes">
                    <? foreach ($data_place as $place): ?>
                        
                    <label class="list-group-item w-100">
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