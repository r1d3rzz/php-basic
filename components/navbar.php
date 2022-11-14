<?php

error_reporting(1);

$query = $_SERVER['QUERY_STRING'];

switch ($query) {
    case '/':
        header('location: ./views/index.view.php');
        break;
    case 'register':
        header('location: ./views/register.view.php');
        break;
    case 'login':
        header('location: ./views/login.view.php');
        break;
    case 'welcome':
        header('location: ./views/welcome.view.php');
        break;
}

?>

<nav class="navContainer">
    <a href="/">All Users</a> |
    <a href="/?register">Register</a> |
    <a href="/?login">Login</a>
</nav>

<style>
    .navContainer {
        margin-bottom: 20px;
    }

    .navContainer>a {
        text-decoration: none;
        user-select: none;
    }
</style>