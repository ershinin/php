<?php
return [
    [
        'path' => '/',
        'method' => 'GET',
        'parameter' => false,
        'controller' => 'Cakes\Controllers\IndexController::index'
    ],
    [
        'path' => '/cakes',
        'method' => 'GET',
        'parameter' => false,
        'controller' => 'Cakes\Controllers\CakeController::getCakesPreviews'
    ],
    [
        'path' => '/cakes',
        'method' => 'GET',
        'parameter' => true,
        'controller' => 'Cakes\Controllers\CakeController::getCake'
    ],
    [
        'path' => '/addCake',
        'method' => 'POST',
        'parameter' => false,
        'controller' => 'Cakes\Controllers\CakeController::addCake'
    ],
    [
        'path' => '/findCakes',
        'method' => 'GET',
        'parameter' => true,
        'controller' => 'Cakes\Controllers\CakeController::findCakes'
    ],

];