<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>Места</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/style.css" rel="stylesheet">
  <script defer src="../../js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php $activePage = 'places'; include '../header/header_cultural_journey.php'; ?>
<div class="content-wrap">
  <h1 class="h3 text-center mt-5">Маршрут «<?=$data[0]["route_name"]?>»</h1>
  <p class="fs-5 text-center">Список мест</p>
  <div class="container mt-3">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
    <?php foreach($data as $row):?>
    <div class="col marg-top-20"> 
        <div class="card card-place card-cursor" data-id="<?=$row['place_id']?>" data-bs-toggle="modal" data-bs-target="#cardModal<?=$row['place_id']?>">
            <img src="../<?=$row['img']?>" class="card-img-top" alt="Card Image">
            <div class="card-body d-flex align-items-center">
                <p class="card-title h-place m-0"><?=$row['place_name']?></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
      <!-- <div class="col marg-top-20">
        <div class="card card-place card-cursor" data-bs-toggle="modal" data-bs-target="#cardModal2">
            <img src="../../svg/way_to_past/2.jpeg" class="card-img-top" alt="Card Image">
            <div class="card-body d-flex align-items-center">
                <p class="card-title h-place m-0">Соловецким юнгам</p>
            </div>
        </div>
      </div>
      <div class="col marg-top-20">
        <div class="card card-place card-cursor" data-bs-toggle="modal" data-bs-target="#cardModal3">
            <img src="../../svg/way_to_past/3.jpeg" class="card-img-top" alt="Card Image">
            <div class="card-body d-flex align-items-center">
                <p class="card-title h-place m-0">Памятник тюленю-спасителю</p>
            </div>
        </div>
      </div>
      <div class="col marg-top-20">
        <div class="card card-place card-cursor" data-bs-toggle="modal" data-bs-target="#cardModal4">
            <img src="../../svg/way_to_past/4.jpeg" class="card-img-top" alt="Card Image">
            <div class="card-body d-flex align-items-center">
                <p class="card-title h-place m-0">Монумент победы в войне 1941-1945 ГГ.</p>
            </div>
        </div>
      </div>
      <div class="col marg-top-20">
        <div class="card card-place card-cursor" data-bs-toggle="modal" data-bs-target="#cardModal5">
            <img src="../../svg/way_to_past/5.jpeg" class="card-img-top" alt="Card Image">
            <div class="card-body d-flex align-items-center">
                <p class="card-title h-place m-0">Участникам Северных конвоев</p>
            </div>
        </div>
      </div>
      <div class="col marg-top-20">
        <div class="card card-place card-cursor" data-bs-toggle="modal" data-bs-target="#cardModal6">
            <img src="../../svg/way_to_past/6.jpeg" class="card-img-top" alt="Card Image">
            <div class="card-body d-flex align-items-center">
                <p class="card-title h-place m-0">Стела «Город воинской славы»</p>
            </div>
        </div>
      </div>
      <div class="col marg-top-20">
        <div class="card card-place card-cursor" data-bs-toggle="modal" data-bs-target="#cardModal7">
            <img src="../../svg/way_to_past/7.jpeg" class="card-img-top" alt="Card Image">
            <div class="card-body d-flex align-items-center">
                <p class="card-title h-place m-0">Обелиск Севера</p>
            </div>
        </div>
      </div>
      <div class="col marg-top-20">
        <div class="card card-place card-cursor" data-bs-toggle="modal" data-bs-target="#cardModal8">
            <img src="../../svg/way_to_past/8.jpeg" class="card-img-top" alt="Card Image">
            <div class="card-body d-flex align-items-center">
                <p class="card-title h-place m-0">Памятник Ленину</p>
            </div>
        </div>
      </div>
      <div class="col marg-top-20 mx-auto">
        <div class="card card-place card-cursor" data-bs-toggle="modal" data-bs-target="#cardModal9">
            <img src="../../svg/way_to_past/9.jpeg" class="card-img-top" alt="Card Image">
            <div class="card-body d-flex align-items-center">
                <p class="card-title h-place m-0">Нулевая верста</p>
            </div>
        </div>
      </div> -->
    </div>
  </div>
  </div>
  <div class="modal fade" id="placeModal" tabindex="-1" aria-labelledby="placeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        </div>
      </div>
    </div>
  </div>
  <?php $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];?>
  <? include ($url.'/modals/modals_1.php'); ?>
<footer class="shadow-footer" style="margin-top: 100px;"> 
    <nav class="navbar navbar-expand-lg pt-4"> 
      <div class="container d-flex justify-content-center justify-content-sm-start"> 
        <a href="/" class="navbar-brand"> 
          <img src="../../svg/logo.svg" class="brand w-nav-brand"> 
        </a>
        <div class="col text-center">
          <ul class="navbar-nav ms-0 ms-sm-4"> 
            <li class="nav-item"> 
              <a href="/routes" class="nav-link color-blue <?php echo ($activePage == 'routes') ? 'active' : ''; ?>">Маршруты</a> 
            </li>
            <li class="nav-item"> 
              <a href="/routes/cultural_journey" class="nav-link color-blue <?php echo ($activePage == 'map') ? 'active' : ''; ?>">Карта</a>
            </li> 
            <li class="nav-item"> 
              <a href="/routes/places_cultural_journey" class="nav-link color-blue <?php echo ($activePage == 'places') ? 'active' : ''; ?>">Места «Культурное путешествие»</a> 
            </li>
          </ul>
        </div> 
      </div> 
    </nav>
    <div class="container text-center mt-4"> 
      <p class="pb-4 m-0">copyright 2024 kp - design: 351015</p> 
    </div> 
</footer>
</body>
<script>
  document.addEventListener('DOMContentLoaded', () => {
  const placeCards = document.querySelectorAll('.card-place');

placeCards.forEach(card => {
  card.addEventListener('click', function () {
    const placeId = this.dataset.id;
    loadModalData(placeId);
  });
});

function loadModalData(id) {
  fetch(`../../modals/modals_1.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
      const modalBody = document.querySelector('#placeModal .modal-body');
      modalBody.innerHTML = data;
      const placeModal = new bootstrap.Modal(document.getElementById('placeModal'));
      placeModal.show();
    })
    .catch(error => console.error('Ошибка при загрузке данных:', error));
}
});
</script>
</html>