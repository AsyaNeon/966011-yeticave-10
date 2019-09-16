<?php

require_once 'database.php';

$link = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
mysqli_set_charset($link, DBUTF);

$is_auth = rand(0, 1);

$user_name = 'AsyaNeon';

$title = '';

$content = '';