<?php if (isset($place)): ?>
    <div>
        <h5 class="text-center" id="placeModalLabel"><?= htmlspecialchars($place['name'], ENT_QUOTES, 'UTF-8') ?></h5>
        <p class="text-center"><?= htmlspecialchars($place['address'], ENT_QUOTES, 'UTF-8') ?></p>
        <img class="d-block mx-auto img-card-detail" src="<?= htmlspecialchars($place['big_img_modal'], ENT_QUOTES, 'UTF-8') ?>" alt="">
        <p class="mt-3"><?= nl2br(htmlspecialchars($place['description'], ENT_QUOTES, 'UTF-8')) ?></p>
        <iframe class="w-100" src="https://yandex.ru/map-widget/v1/?um=constructor%3A8af071d7-19f7-4a5f-b240-8c1a1d18253f&amp;source=constructor&amp;ll=<?= htmlspecialchars($place['lon'], ENT_QUOTES, 'UTF-8') ?>%2C<?= htmlspecialchars($place['lat'], ENT_QUOTES, 'UTF-8') ?>&amp;pt=<?= htmlspecialchars($place['lon'], ENT_QUOTES, 'UTF-8') ?>%2C<?= htmlspecialchars($place['lat'], ENT_QUOTES, 'UTF-8') ?>&amp;z=16" height="300" frameborder="0"></iframe>
    </div>
<?php else: ?>
    <p>Данные о месте отсутствуют.</p>
<?php endif; ?>