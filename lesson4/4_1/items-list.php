<?php
$items = require_once 'items-data.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Товары</title>
    <link rel="stylesheet" href="./css/items.css">
</head>
<body>
<main>
    <? foreach ($items as $item): ?>
        <div class="item">
            <h2><?= $item['title'] ?></h2>
            <p>Стоимость: <?= $item['price']?> руб.</p>
            <div>
                <img src="./images/<?= $item['image'] ?>">
            </div>
            <?php if ($item['count'] > 0): ?>
                <a href="item.php?id=<?= $item['id'] ?>">Подробнее</a>
            <?php else: ?>
                <p>Товар закончился</p>
            <?php endif; ?>
        </div>
    <? endforeach; ?>
</main>
</body>
</html>
