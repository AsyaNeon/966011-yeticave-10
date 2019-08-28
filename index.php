<?php

require_once('templates/functions.php');
require_once 'templates/init.php';

if (!$link) {
    $error = mysqli_connect_error();
    $content = include_template('templates/layout.php', ['content' => $error]);
} else {
    // Запрос на получение списка категорий
    $sql = 'SELECT title, code FROM categories ORDER BY id ASC';

    // Выполняем запрос и получаем результат
    $result = mysqli_query($link, $sql);

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
    $sql = 'SELECT l.title, initial_cost, image, c.title AS category, date_completion FROM lot l '
        . 'INNER JOIN categories c ON l.category_id = c.id '
        . 'WHERE date_completion > NOW() '
        . 'ORDER BY date_create DESC';

    if ($res = mysqli_query($link, $sql)) {
        $lot = mysqli_fetch_all($res, MYSQLI_ASSOC);
    } else {
        $content = include_template('layout.php', ['content' => $error]);
    }
}

$page_content = include_template('main.php', [
    'categories' => $categories,
    'lot' => $lot
]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => 'Главная',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'categories' => $categories
]);

print($layout_content);

