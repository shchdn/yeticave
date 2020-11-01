<?php
date_default_timezone_set('Europe/Moscow');

$is_auth = (bool) rand(0, 1);
$page_title = 'Yeticave';

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];
$products = [
    ['name' => '2014 Rossignol District Snowboard',
    'category' => 'Доски и лыжи',
    'price' => 10999,
    'image_path' => 'img/lot-1.jpg'],

    ['name' => 'DC Ply Mens 2016/2017 Snowboard',
    'category' => 'Доски и лыжи',
    'price' => 159999,
    'image_path' => 'img/lot-2.jpg'],

    ['name' => 'Крепление Union Contact Pro 2015 года размер L/XL',
    'category' => 'Крепления',
    'price' => 8000,
    'image_path' => 'img/lot-3.jpg'],

    ['name' => 'Ботинки для сноуборда DC Mutiny Charocal',
    'category' => 'Ботинки',
    'price' => 10999,
    'image_path' => 'img/lot-4.jpg'],

    ['name' => 'Куртка для сноуборда DC Mutiny Charocal',
    'category' => 'Одежда',
    'price' => 7500,
    'image_path' => 'img/lot-5.jpg'],

    ['name' => 'Маска Oakley Canopy',
    'category' => 'Разное',
    'price' => 5400,
    'image_path' => 'img/lot-6.jpg'],
];
for ($i = 0; $i < count($products); $i++){
    $products[$i]['id'] = $i + 1;
}

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];
