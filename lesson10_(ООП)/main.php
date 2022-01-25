<?php
require_once 'Item.php';
require_once 'ItemStorage.php';
// создать объекты Item (товар) и ItemStore (хранилище),
$bread = new Item(1, 'Bread', 45);
$milk = new Item(2, 'Milk', 55);
$cup = new Item(3, 'Cup', 170, 'Ceramic');
$spoon = new Item(4, 'Spoon', 90, 'Metal');
$storage = new ItemStorage();

// добавить товары в хранилище
$storage->add_item($bread);
$storage->add_item($milk);
$storage->add_item($cup);
$storage->add_item($spoon);

// вызвать методы поиска товаров в хранилище:
    // get_by_material,
var_dump($storage->get_by_material('Ceramic'));
    // get_by_price_and_material,
var_dump($storage->get_by_price_and_material(10,'Metal'));
    // get_by_price
var_dump($storage->get_by_price(60, 200));