<?php

error_reporting(1);

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

function store($name, $email, $pass)
{
    $query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$pass')";
    $result = mysqli_query(dbConnect(), $query);
    echo $result > 0 ? 'Store' : 'Fail';
}

function uniquerInsert($name, $email, $pass)
{
    $pass = crypt(sha1(md5($pass, true), true), sha1(md5($pass, true)));
    $db = dbConnect();
    $query = "SELECT * FROM users WHERE name='$name' && email='$email'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Your Username or Email is Already Exits.Try New One";
    } else {
        store($name, $email, $pass);
    }
}



uniquerInsert('TUNTUN', 'tuntun@gmail.com', 'rider');
