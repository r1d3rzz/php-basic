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

function dbConnection()
{
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!mysqli_errno($db) > 0) {
        return $db;
    }
}

function createUser()
{
    $users = json_decode(file_get_contents('users.json'));
    foreach ($users as $user) {
        $db = dbConnection();
        $query = "INSERT INTO users VALUES ($user->id,'$user->name','$user->creator','$user->email','$user->password')";
        $result = mysqli_query($db, $query);
        echo $result ? "Created" : "Fail";
    };
}

// createUser();
