<!DOCTYPE html>
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
<?php $activePage = 'places'; include '../header.php'; ?>
<div class="content-wrap">
  <h1 class="text-h text-center mt-5">Места</h1>
  <div class="container mt-3">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
    <?php foreach ($data as $row): ?> 
    <a href="../change_places/index.php?id=<?=$row['id']?>" class="text-decoration-none text-dark">
      <div class="col marg-top-20">
        <div class="card card-place card-cursor">
            <img src="../<?=$row['img']?>" class="card-img-top" alt="Card Image">
            <div class="card-body d-flex align-items-center">
                <p class="card-title h-place m-0"><?= $row['name']?></p>
            </div>
        </div>
      </div>
      </a>
      <? endforeach; ?>
    </div>
  </div>
  </div>
<?php include('../footer.php'); ?>
</body>
</html>