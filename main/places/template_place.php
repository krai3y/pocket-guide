<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>Места</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <script defer src="../js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php $activePage = 'places';
  include '../header.php'; ?>
  <div class="content-wrap">
    <h1 class="text-h text-center mt-5">Места</h1>
    <div class="container mt-3">
      <div class="dropdown d-flex justify-content-end">
        <button class="btn dropdown-toggle set-place py-2 px-2 br-14 border-color" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="me-3">Фильтр</span><img src="../svg/funnel.svg" alt="" width="16" height="16">
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" data-filter="все" href="#">Все</a></li>
          <li><a class="dropdown-item" value="dost" data-filter="dost" href="#">Достопримечательности</a></li>
          <li><a class="dropdown-item" value="gost" data-filter="gost" href="#">Гостиницы</a></li>
          <li><a class="dropdown-item" value="cafe" data-filter="cafe" href="#">Кафе</a></li>
          <li><a class="dropdown-item" value="park" data-filter="park" href="#">Сквер, парк культуры и отдыха</a></li>
        </ul>
      </div>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <?php foreach ($data as $row) : ?>
          <div data-filter="<?= $row['filter'] ?>" class="col marg-top-20" >
            <div class="card card-place card-cursor" data-id="<?=$row['id']?>" data-bs-toggle="modal" data-bs-target="#cardModal<?= $row['id'] ?>" >
              <img src="<?= $row['img'] ?>" class="card-img-top" alt="Card Image">
              <div class="card-body d-flex align-items-center">
                <p class="card-title h-place m-0"><?= $row['name'] ?></p>
              </div>
              </div>
          </div>
        <?php endforeach; ?>
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
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const filterDropdown = document.querySelector('.dropdown-menu');
      const places = Array.from(document.querySelectorAll('.marg-top-20'));
      const container = document.querySelector('.row');

      filterDropdown.addEventListener('click', function (e) {
        if (e.target.tagName === 'A') {
          const filterValue = e.target.getAttribute('data-filter').toLowerCase();
          container.innerHTML = '';

          const filteredPlaces = places.filter(place => {
            const placeFilter = place.dataset.filter.toLowerCase();
            return filterValue === 'все' || filterValue === placeFilter;
          });

          const fragment = document.createDocumentFragment();
          filteredPlaces.forEach(place => fragment.appendChild(place));
          container.appendChild(fragment);
        }
      });
      const placeCards = document.querySelectorAll('.card-place');

      placeCards.forEach(card => {
        card.addEventListener('click', function () {
          const placeId = this.dataset.id;
          loadModalData(placeId);
        });
      });

      function loadModalData(id) {
        fetch(`../modals/modals_1.php?id=${id}`)
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
  <? include('../modals/modals_1.php'); ?>
  <? include('../footer.php'); ?>
</body>

</html>