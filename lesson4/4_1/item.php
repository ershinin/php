<?php
$get = $_GET;
$id = $get['id'];

if (!isset($id)) {
    //header("Location: items-list.php");
    echo $id;
}

function getItem(int $id) {
    $items = require_once 'items-data.php';
    foreach ($items as $item){
        if ($id === $item['id']) return $item;
    }
}

$item = getItem($id);
if (!isset($item)) {
    //header("Location: items-list.php");
    echo $item;
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о товаре</title>
    <link rel="stylesheet" href="./css/item.css">
</head>
<body>
<main>
    <div class="item">
        <h2><?= $item['title'] ?></h2>
        <p>Количество: <?= $item['count'] ?> шт.</p>
        <p>Стоимость: <?= $item['price']?> руб.</p>
        <p><?= $item['description'] ?></p>
        <div>
            <img src="./images/<?= $item['image'] ?>">
        </div>
        <a href="items-list.php">Вернуться к списку товаров</a>
    </div>
</main>
</body>
</html>

