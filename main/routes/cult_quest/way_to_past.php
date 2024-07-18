<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>Созданный маршрут</title>
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/style.css" rel="stylesheet">
  <script defer src="../../js/bootstrap.bundle.min.js"></script>
  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=a52c9117-0c92-4019-824e-df6145a1426e" type="text/javascript"></script>
</head>

<body>
  <?php $activePage = 'map'; include('../header/header_cult_quest.php'); ?>
  <div id="container"></div>

  <script>
    ymaps.ready(init);

    function init() {
      var myMap = new ymaps.Map('container', {
        center: [64.54006439121255, 40.515819492732874], // Координаты центра карты
        zoom: 15 // Уровень приближения карты
      });

      var multiRoute2 = new ymaps.multiRouter.MultiRoute({
        referencePoints: [<? foreach ($data as $row): ?>
            <?$coord.= '['.$row['lat'].','.$row['lon'].']'.', ' ?>
          // [64.5364759332824, 40.51492899940777]
            <? endforeach;?>
            <?=rtrim($coord, ', ') ?>
        ],
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