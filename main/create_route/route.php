<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>Созданный маршрут</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <script defer src="../js/bootstrap.bundle.min.js"></script>
  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=a52c9117-0c92-4019-824e-df6145a1426e" type="text/javascript"></script>
</head>

<body>
  <?php $activePage = 'c_route'; include('../header.php'); ?>
  <div id="container"></div>

  <script>
    ymaps.ready(init);

    function init() {
      var selectedPlaces = JSON.parse(localStorage.getItem('selectedPlaces'));
      var firstPlace = selectedPlaces[0];
      var firstPlaceCoords = [firstPlace.lat, firstPlace.lon];
      var myMap = new ymaps.Map('container', {
        center: firstPlaceCoords, // Координаты центра карты
        zoom: 15 // Уровень приближения карты
      });
      console.log(JSON.parse(localStorage.getItem('selectedPlaces')))
      // Извлечение координат из localStorage
      

      if (!selectedPlaces || selectedPlaces.length === 0) {
        alert('Не удалось загрузить маршрут. Пожалуйста, вернитесь и выберите места.');
        return;
      }

      var points = selectedPlaces.map(function(place) {
        return [place.lat, place.lon];
      });

      var multiRoute2 = new ymaps.multiRouter.MultiRoute({
        referencePoints: points,
        params: {
          routingMode: 'pedestrian' // Установка режима маршрутизации на пешеходный
        }
      }, {
        boundsAutoApply: true // Применять автоматически границы области просмотра карты
      });

      // Добавление пешеходного маршрута на карту
      myMap.geoObjects.add(multiRoute2);
    }
  </script>
</body>

</html>