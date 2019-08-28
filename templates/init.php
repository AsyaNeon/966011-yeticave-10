<?php

$db = require_once 'templates/database.php';

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
mysqli_set_charset($link, "utf8");

$is_auth = rand(0, 1);

$user_name = 'AsyaNeon';

$title = '';

$content = '';