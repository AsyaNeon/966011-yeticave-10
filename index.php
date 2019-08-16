<?php

require_once('templates/functions.php');
require_once('templates/data.php');

function shows_cost($number) {
    $number = ceil($number);

    if ($number >= 1000) {
        $number = number_format($number, 0, '.', ' ');
    }

  	return $number . ' ₽';
}

function esc($str) {
    $text = htmlspecialchars($str);

    return $text;
}

$page_content = include_template('main.php', [
        'product_category' => $product_category,
        'ads' => $ads
]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => 'Главная',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'product_category' => $product_category
]);

print($layout_content);


