<?php

error_reporting(1);

session_start();

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
    case 'edit':
        header('location: ./views/edit.view.php');
        break;
}

?>

<nav class="navContainer">
    <a href="/">All Users</a>
    <?php
    if (!isset($_SESSION['email'])) {
        echo " | <a href='/?register'>Register</a>";
        echo " | <a href='/?login'>Login</a>";
    } else {
        echo " | <a href='/?welcome'>Profile</a>";
    }
    ?>
</nav>

<style>
    .navContainer {
        text-align: center;
        margin-bottom: 20px;
    }

    .navContainer>a {
        text-decoration: none;
        user-select: none;
    }
</style>