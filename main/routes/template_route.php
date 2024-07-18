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
  <?php $activePage = 'routes'; include '../header.php'; ?>
  <div class="content-wrap">
  <h1 class="text-h text-center mt-5">Маршруты</h1>
  <div class="container mt-3">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
    <? foreach($data as $row): ?>
      <a href="<?=$row['link']?>" class="text-decoration-none text-dark">
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
      <? endforeach;?>
      <!-- <a href="way_to_past" class="text-decoration-none text-dark">
      <div class="col marg-top-20">
        <div class="card card-hover mx-auto">
          <img class="card-img-top" src="../svg/way_to_past/160.png" alt="...">
          <div class="card-body">
            <div class="mb-4">
              <p class="text-rec">Путь в прошлое</p>
            </div>
            <div class="row">
              <div class="col">
                <img src="../svg/map-fill.svg" alt="">
                <span>940м</span>
              </div>
              <div class="col text-end">
                <img src="../svg/time.svg" alt="">
                <span>1ч 20мин</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      </a>
      <a href="way_to_past" class="text-decoration-none text-dark">
      <div class="col marg-top-20">
        <div class="card card-hover mx-auto">
          <img class="card-img-top" src="../svg/way_to_past/160.png" alt="...">
          <div class="card-body">
            <div class="mb-4">
              <p class="text-rec">Путь в прошлое</p>
            </div>
            <div class="row">
              <div class="col">
                <img src="../svg/map-fill.svg" alt="">
                <span>940м</span>
              </div>
              <div class="col text-end">
                <img src="../svg/time.svg" alt="">
                <span>1ч 20мин</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      </a>
      <a href="way_to_past" class="text-decoration-none text-dark">
      <div class="col marg-top-20">
        <div class="card card-hover mx-auto">
          <img class="card-img-top" src="../svg/way_to_past/160.png" alt="...">
          <div class="card-body">
            <div class="mb-4">
              <p class="text-rec">Путь в прошлое</p>
            </div>
            <div class="row">
              <div class="col">
                <img src="../svg/map-fill.svg" alt="">
                <span>940м</span>
              </div>
              <div class="col text-end">
                <img src="../svg/time.svg" alt="">
                <span>1ч 20мин</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      </a>
      <a href="way_to_past" class="text-decoration-none text-dark">
      <div class="col marg-top-20">
        <div class="card card-hover mx-auto">
          <img class="card-img-top" src="../svg/way_to_past/160.png" alt="...">
          <div class="card-body">
            <div class="mb-4">
              <p class="text-rec">Путь в прошлое</p>
            </div>
            <div class="row">
              <div class="col">
                <img src="../svg/map-fill.svg" alt="">
                <span>940м</span>
              </div>
              <div class="col text-end">
                <img src="../svg/time.svg" alt="">
                <span>1ч 20мин</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      </a>
      <a href="way_to_past" class="text-decoration-none text-dark">
      <div class="col marg-top-20">
        <div class="card card-hover mx-auto">
          <img class="card-img-top" src="../svg/way_to_past/160.png" alt="...">
          <div class="card-body">
            <div class="mb-4">
              <p class="text-rec">Путь в прошлое</p>
            </div>
            <div class="row">
              <div class="col">
                <img src="../svg/map-fill.svg" alt="">
                <span>940м</span>
              </div>
              <div class="col text-end">
                <img src="../svg/time.svg" alt="">
                <span>1ч 20мин</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      </a> -->
    </div>
  </div>
  </div>
<? include('../footer.php'); ?>
</body>
</html>



