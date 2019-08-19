<?php

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

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

function get_time_range($date) {
    $end_ts = strtotime($date);
    $diff_ts = $end_ts - time();

    $hours = floor($diff_ts / 3600);
    $minutes = floor(($diff_ts % 3600) / 60);

    $time = [$hours, $minutes];

    if ($time[0] < 10) {
        $time[0] = 0 . $time[0];
    }

    if ($time[1] < 10) {
        $time[1] = 0 . $time[1];
    }

    return $time;
}
