<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'test');

function dd($data) //error or bug checker function ;)
{
    echo "<pre>";
    die(print_r($data, true));
}

function dbConnect()
{
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!mysqli_errno($db) > 0) {
        return '<h3>Connected Successfully</h3>';
    }
}

dd(dbConnect());
