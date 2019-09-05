<?php

require_once 'templates/functions.php';
require_once 'templates/init.php';

if (!$link) {
    $error = mysqli_connect_error();
    $content = include_template('layout.php', ['content' => $error]);
} else {

    // Выполняем запрос и получаем результат
    $result = mysqli_query($link, 'SELECT title, code FROM categories ORDER BY id ASC');

    // запрос выполнен успешно
    if ($result) {
        // получаем все категории в виде двумерного массива
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // получить текст последней ошибки
        $error = mysqli_error($link);
        $content = include_template('layout.php', ['content' => $error]);
    }
    // запрос на получение самых новых открытых лотов
    $res = mysqli_query($link,
        'SELECT l.id, l.title, initial_cost, image, c.title AS category, date_completion FROM lot l 
        INNER JOIN categories c ON l.category_id = c.id 
        WHERE date_completion > NOW() 
        ORDER BY date_create DESC');

    if ($res) {
        $lot = mysqli_fetch_all($res, MYSQLI_ASSOC);
    } else {
        $content = include_template('layout.php', ['content' => $error]);
    }

    $content = include_template('main.php', [
        'categories' => $categories,
        'lot' => $lot
    ]);

    if (isset($_GET['id'])) {
        $sort_field = 'id';
    }

    $res = mysqli_query($link,
        'SELECT l.id, l.title, description, image, initial_cost, date_completion, step_rate, c.title AS category
        FROM lot l
        INNER JOIN categories c ON l.category_id = c.id
        WHERE l.id = $sort_field');

    if ($res) {
        $lot = mysqli_fetch_all($res, MYSQLI_ASSOC);
        $content = include_template('lot.php', ['categories' => $categories]);
    } else {
        //$content = include_template('layout.php', ['content' => $error]);
    }

}


$layout_content = include_template('layout.php', [
    'content' => $content,
    'title' => 'Главная',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'categories' => $categories
]);

print($layout_content);

