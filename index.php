<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'test');

function dd($data)
{
    echo "<pre>";
    die(print_r($data, true));
}

function dbConnect()
{
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!mysqli_errno($db) > 0) {
        return $db;
    };
}

function excuteQuery($query)
{
    $result = mysqli_query(dbConnect(), $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<h3>Total Users (" . mysqli_num_rows($result) . ")</h3>";
        foreach ($result as $item) {
            echo 'Name = ' . $item['name'] . "<br/>";
            echo 'Email = ' . $item['email'] . "<br/>";
            echo 'Password = ' . $item['password'] . "<br/>";
            echo "<hr/>";
        }
    }
}

$query = 'SELECT * FROM users';

excuteQuery($query);
