<?php

require_once 'functions.php';
require_once 'init.php';

$result = mysqli_query($link, 'SELECT id, title FROM categories');

if ($result) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $cat_id = array_column($categories, 'id');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

    $required = ['title', 'description', 'category_id', 'initial_cost', 'step_rate', 'date_completion'];
    $errors = [];

    $rules = [
        'category_id' => function () use ($cat_id) {
            return validateCategory('category_id', $cat_id);
        },
        'title' => function () {
            return validateLength('title', 10, 200);
        },
        'description' => function () {
            return validateLength('description', 10, 3000);
        },
        'initial_cost' => function () {
            return validateNumber('initial_cost');
        },
        'step_rate' => function () {
            return validateNumber('step_rate');
        },
        'date_completion' => function () {
            return validateDate('date_completion');
        }
    ];

    foreach ($_POST as $key => $value) {
        if (isset($rules[$key])) {
            $rule = $rules[$key];
            $errors[$key] = $rule();
        }
    }

    $errors = array_filter($errors);

    if (isset($_FILES['lot_img']['name'])) {
        $tmp_name = $_FILES['lot_img']['tmp_name'];
        $path = $_FILES['lot_img']['name'];

        if (mime_content_type('lot_img' == 'image/jpeg')) {
            $filename = uniqid() . '.jpeg';
        }

        if (mime_content_type('lot_img' == 'image/png')) {
            $filename = uniqid() . '.png';
        }

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);

        if ($file_type !== "image/jpeg" xor $file_type !== "image/png") {
            $errors['file'] = 'Загрузите картинку в формате jpeg или png';
        } else {
            move_uploaded_file($tmp_name, 'uploads/' . $filename);
            $lot['path'] = $filename;
        }
    } else {
        $errors['file'] = 'Вы не загрузили файл';
    }

    if (count($errors)) {
        $content = include_template('add-lot.php', ['errors' => $errors, 'categories' => $categories]);
    } else {
        $sql = 'INSERT INTO lot (date_create, title, description, image, initial_cost, date_completion, step_rate,
            author_id, category_id) VALUES (NOW(), ?, ?, ?, ?, ?, ?, 1, ?)';

        $stmt = db_get_prepare_stmt($link, $sql, $lot);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            $lot_id = mysqli_insert_id($link);

            header("Location: lot.php/?id=" . $lot_id);
        } else {
            $content = mysqli_error($link);
        }
    }
} else {
    $content = include_template('add-lot.php', [
        'categories' => $categories
    ]);
}