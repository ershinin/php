<?php
$items = [
    [
        'id' => 1,
        'title' => 'Flute',
        'price' => 20000,
        'img' => 'flute.jpg',
        'description' => [
            'color' => 'white',
            'material' => 'bamboo'
        ]
    ],
    [
        'id' => 2,
        'title' => 'Guitar',
        'price' => 18000,
        'img' => 'guitar.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'linden'
        ]
    ],
    [
        'id' => 3,
        'title' => 'Drum',
        'price' => 68000,
        'img' => 'drum.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'steel'
        ]
    ],
];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Goods</title>
</head>
<body>
<section>
    <?php foreach ($items as $item): ?>
        <div>
            <h3><?= $item['id'].'. '.$item['title'] ?></h3>
            <span>Стоимость: <?= $item['price'] ?></span>
            <img src="<?= $item['img'] ?>" alt="<?= $item['img'] ?>">
            <span>Описание:</span>
            <span>Цвет - <?= $item['description']['color'] ?></span>
            <span>Материал - <?= $item['description']['material'] ?></span>
        </div>
    <?php endforeach; ?>

</section>
</body>
</html>
