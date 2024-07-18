<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>Главная</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script defer src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<? include('header.php'); ?>
<div class="content-wrap">
  <div class="container marg-container">
    <div class="row">
      <div class="col-lg">
        <h1 class="text-h">Откройте для себя места из «Карманного путеводителя»</h1>
        <p class="text-p mt-4 mt-sm-5">Откройте местоположение знаковых мест и развлечений. Просмотрите все на карте. Составьте свой собственный путеводитель.</p>
        <a href="/routes" class="btn btn-index fs-5 mt-4 mt-sm-5 py-3 px-5 rounded-pill">Начать путешествие</a>
      </div>
      <div class="col-lg-5 mb-0 mb-sm-4 mb-lg-0 miu">
        <img class="float-start float-lg-end mw-100 d-none d-sm-block" src="svg/tower.png" alt="">
      </div>
    </div>
  </div>
  <div class="container marg-container">
    <div class="row">
      <div class="col-lg">
        <img class="mw-100" src="svg/images.png" alt="">
      </div>
      <div class="col-lg-5 mt-3 mt-sm-5">
        <h2 class="text-h">Посмотрите на данные без прикрас</h2>
        <p class="text-p mt-5">Откройте для себя увлекательные достопримечательности и места в вашем окружении. Узнайте, сколько интересных мест доступно вам.</p>
        <div class="row mt-4 mt-sm-5">
          <div class="col-sm-3 text-center text-sm-start">
            <p class="number-about m-0">48</p>
            <p class="text-about">Количество мест</p>
          </div>
          <div class="col-sm-3 text-center text-sm-start">
            <p class="number-about m-0">6</p>
            <p class="text-about">Количество маршрутов</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container marg-container">
    <h2 class="text-h">Рекомендации</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <? foreach($data as $row):?>
        <a href="routes/<?=$row['link']?>" class="text-decoration-none text-dark">
      <div class="col marg-top-20">
        <div class="card card-hover mx-auto">
          <img class="card-img-top" src="<?=$row['img']?>" alt="...">
          <div class="card-body">
            <div class="mb-4">
              <p class="text-rec"><?=$row['name']?></p>
            </div>
            <div class="row">
              <div class="col">
                <img src="../svg/map-fill.svg" alt="">
                <span><?=splitDistance($row['distance'])?></span>
              </div>
              <div class="col text-end">
                <img src="../svg/time.svg" alt="">
                <span><?=convertMinutesToHours($row['time'])?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      </a>
      <? endforeach; ?>
    </div>
  </div>
</div>
<? include('footer.php'); ?>
</body>
</html>