<?php
error_reporting(1);

$query = $_SERVER['QUERY_STRING'];

switch ($query) {
    case "home":
        header('Location:index.php');
        break;
    case "profile":
        header('Location:profile.php');
        break;
    case "products":
        header('Location:products.php');
        break;
    case "logout":
        header('Location:logout.php');
        break;
}

?>

<nav>
    <a href="/?home">Home</a> |
    <a href="/?products">Products</a> |
    <a href="/?profile">Profile</a> |
    <a href="/?logout">Logout</a>
</nav>