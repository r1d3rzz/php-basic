<?php

error_reporting(1);

function redirect($path){
    echo "?$path";
}

$query = $_SERVER['QUERY_STRING'];

switch($query){
    case "home" : 
        header('location: ./home.php');
        break;
    case "about" : 
        header('location: ./about.php');
        break;
    case "contact" : 
        header('location: ./contact.php');
        break;
    default : echo "This is Main Page";
}

?>

<table border="1">
    <tr>
        <td>Home Page</td>
        <td><a href="<?php redirect('home') ?>">Home</a></td>
    </tr>
    <tr>
        <td>About Page</td>
        <td><a href="<?php redirect('about') ?>">About</a></td>
    </tr>
    <tr>
        <td>Contact Page</td>
        <td><a href="<?php redirect('contact') ?>">Contact</a></td>
    </tr>
</table>