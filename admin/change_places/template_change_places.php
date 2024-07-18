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
    <?php $activePage = 'places'; include '../header.php'; ?>
    <div class="content-wrap">
        
        <h1 class="text-h text-center mt-5">Изменение места</h1>
        <? foreach ($data as $row):?>
        <form action="" method="post">
        <p class="text-h text-center"><?=$row['name']?></p>
        <div class="container mt-3 text-center">
            <p class="text">Название</p>
            <input type="text" placeholder="<?=$row['name']?>" name="name" value="<?=$_POST['name'] ?? $row['name']?>" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <span><?=$errors['name']?></span>
            <p class="text">Широта</p>
            <input type="text" placeholder="<?=$row['lat']?>" name="lat" value="<?=$_POST['lat'] ?? $row['lat']?>" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <span><?=$errors['lat']?></span>
            <p class="text">Долгота</p>
            <input type="text" placeholder="<?=$row['lon']?>" name='lon' value="<?=$_POST['lon'] ?? $row['lon']?>" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <span><?=$errors['lon']?></span>
            <p class="text">Адрес</p>
            <input type="text" placeholder="<?=$row['address']?>" name='address' value="<?=$_POST['address'] ?? $row['address']?>" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <span><?=$errors['address']?></span>
            <p class="text">Путь к картинке анонса</p>
            <input type="text" placeholder="<?=$row['img']?>" name='img' value="<?=$_POST['img'] ?? $row['img']?>" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <span><?=$errors['img']?></span>
            <p class="text">Ссылка на картинку в модалке</p>
            <input type="text" placeholder="<?=$row['big_img_modal']?>" name='big_img_modal' value="<?=$_POST['big_img_modal'] ?? $row['big_img_modal']?>" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <span><?=$errors['big_img_modal']?></span>
            <p class="text">Тип места</p>
            <input type="text" placeholder="<?=$row['filter']?>" name='filter' value="<?=$_POST['filter'] ?? $row['filter']?>" class="form-control fs-5 mx-auto my-4 w-50 rounded-pill auth-height" aria-describedby="inputGroup-sizing-lg">
            <span><?=$errors['filter']?></span>
            <p class="text">Описание</p>
            <textarea type="text" placeholder="<?=$row['description']?>" name='description'  class="form-control fs-5 mx-auto my-4 w-100 auth-height" aria-describedby="inputGroup-sizing-lg"><?=$_POST['description'] ?? $row['description']?></textarea>
            <input type="submit" name="submit_button" class="btn btn-index fs-5 py-3 px-5 rounded-pill ms-auto mb-5 w-25" value="Добавить">
        </div>
    </form>
    <? endforeach; ?>
    </div>
<? include('../footer.php'); ?>
</body>
</html>