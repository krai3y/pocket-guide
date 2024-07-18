<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>Создание маршрута</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <script defer src="../js/bootstrap.bundle.min.js"></script>
  <style>
    .routecard {
      border: 2px solid #007bff;
    }
  </style>
</head>

<body>
  <?php 
  $activePage = 'c_route';
  include '../header.php'; 
  ?>
  <div class="content-wrap">
    <h1 class="text-h text-center mt-5">Создание маршрута</h1>
    <p class="text-about text-center">(Чтобы добавить место в маршрут, нажмите на карточку)</p>
    <div class="container mt-3">
      <div class="text-center">
        <button id="createRouteButton" class="btn btn-index fs-5 mt-4 mt-sm-5 py-3 px-5 rounded-pill">Создать маршрут</button>
      </div>
      <div class="dropdown d-flex justify-content-end">
        <!-- <button class="btn dropdown-toggle set-place py-2 px-2 br-14 border-color" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="me-3">Фильтр</span><img src="../svg/funnel.svg" alt="" width="16" height="16">
        </button> -->
        <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">Достопримечательности</a></li>
          <li><a class="dropdown-item" href="#">Гостиницы</a></li>
          <li><a class="dropdown-item" href="#">Рестораны, Кафе</a></li>
          <li><a class="dropdown-item" href="#">Скверы, парки культуры и отдыха</a></li>
        </ul> -->
      </div>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3" id="placesContainer">
        <?php foreach ($data as $index => $row): ?>
          <div class="col marg-top-20" data-index="<?=$index?>" data-lat="<?=$row['lat']?>" data-lon="<?=$row['lon']?>"> 
            <div class="card card-cursor card-place" onclick="toggleCardStyle(event, <?=$index?>)">
              <button class="toggle-button" onclick="event.stopPropagation(); toggleCardStyle(event, <?=$index?>)">
                <span class="icon">✖</span>
              </button>
              <img src="<?=$row['img']?>" class="card-img-top" alt="Card Image">
              <div class="card-body d-flex align-items-center">
                <p class="card-title h-place m-0"><?=$row['name']?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <script>
    let selectedPlaces = [];
    let coord = [];

    document.addEventListener('DOMContentLoaded', () => {
      const placesContainer = document.getElementById('placesContainer');
      Array.from(placesContainer.children).forEach((child, index) => {
        const lat = parseFloat(child.getAttribute('data-lat'));
        const lon = parseFloat(child.getAttribute('data-lon'));
        const filter = child.getAttribute('data-filter');
        coord.push({ lat, lon, filter, element: child });
      });
    });

    function toggleCardStyle(event, index) {
      const place = coord[index];
      const cardElement = place.element.querySelector('.card');
      const icon = cardElement.querySelector('.toggle-button .icon');
      const lat = place.lat;
      const lon = place.lon;
      const selected = cardElement.classList.toggle('routecard');

      if (selected) {
        icon.textContent = "✔";
        selectedPlaces.push({ lat, lon });
      } else {
        icon.textContent = "✖";
        selectedPlaces = selectedPlaces.filter(p => p.lat !== lat || p.lon !== lon);
      }
      sortPlaces();
    }

    function calculateDistance(lat1, lon1, lat2, lon2) {
      const R = 6371;
      const dLat = (lat2 - lat1) * Math.PI / 180;
      const dLon = (lon1 - lon2) * Math.PI / 180;
      const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
      const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
      const d = R * c;
      return d;
    }

    function sortPlaces() {
      if (selectedPlaces.length === 0) {
        return;
      }

      const lastSelected = selectedPlaces[selectedPlaces.length - 1];

      const sortedCoords = coord
        .filter(place => !selectedPlaces.some(selected => selected.lat === place.lat && selected.lon === place.lon))
        .sort((a, b) => {
          const distA = calculateDistance(lastSelected.lat, lastSelected.lon, a.lat, a.lon);
          const distB = calculateDistance(lastSelected.lat, lastSelected.lon, b.lat, b.lon);
          return distA - distB;
        });

      const container = document.getElementById('placesContainer');
      container.innerHTML = '';

      selectedPlaces.forEach(selected => {
        const place = coord.find(place => place.lat === selected.lat && place.lon === selected.lon);
        if (place) {
          container.appendChild(place.element);
        }
      });

      sortedCoords.forEach(place => {
        container.appendChild(place.element);
      });
    }

    function filterPlaces() {
      const filterDost = document.getElementById('filterDost').checked;
      const filterCafe = document.getElementById('filterCafe').checked;
      const filterPark = document.getElementById('filterPark').checked;

      coord.forEach(place => {
        const { filter, element } = place;
        const match = 
          (filter === 'dost' && filterDost) || 
          (filter === 'cafe' && filterCafe) || 
          (filter === 'park' && filterPark);

        if (match || (!filterDost && !filterCafe && !filterPark)) {
          element.style.display = '';
        } else {
          element.style.display = 'none';
        }
      });
    }

    document.getElementById('createRouteButton').addEventListener('click', function() {
      if (selectedPlaces.length === 0) {
        alert('Пожалуйста, выберите хотя бы одно место.');
        return;
      }

      // Сохраняем выбранные места в localStorage
      localStorage.setItem('selectedPlaces', JSON.stringify(selectedPlaces));
      console.log(localStorage.getItem('selectedPlaces'))
      // Переходим на страницу с картой
      window.location.href = 'route.php';
    });
  </script>
  <?php include('../footer.php'); ?>
</body>

</html>
