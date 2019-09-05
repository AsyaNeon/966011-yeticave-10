<?php

require_once 'templates/functions.php';
require_once 'templates/init.php';

if (!$link) {
    $error = mysqli_connect_error();
    $content = $error;
} else {
    $result = mysqli_query($link, 'SELECT title, code FROM categories ORDER BY id ASC');

    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($link);
        $content = $error;
    }

    $res = mysqli_query($link,
        'SELECT l.id, l.title, initial_cost, image, c.title AS category, date_completion FROM lot l 
        INNER JOIN categories c ON l.category_id = c.id 
        WHERE date_completion > NOW() 
        ORDER BY date_create DESC');

    if ($res) {
        $lots = mysqli_fetch_all($res, MYSQLI_ASSOC);
    } else {
        $error = mysqli_connect_error();
        $content = $error;
    }

    $content = include_template('main.php', [
        'categories' => $categories,
        'lots' => $lots
    ]);

    if (isset($_GET['id'])) {
        $sort_field = $_GET['id'];
        $res_1 = mysqli_query($link,
            'SELECT l.id, l.title, description, image, initial_cost, date_completion, step_rate, c.title AS category
            FROM lot l
            INNER JOIN categories c ON l.category_id = c.id
            WHERE l.id =' . $sort_field);

        if ($res_1) {
            $lot = mysqli_fetch_all($res_1, MYSQLI_ASSOC);
            $content = include_template('lot.php', [
                'categories' => $categories,
                'lot' => $lot
            ]);
        } else {
            $content = mysqli_error($link);
        }
    }
}


$layout_content = include_template('layout.php', [
    'content' => $content,
    'title' => 'YetiCave',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'categories' => $categories
]);

print($layout_content);

