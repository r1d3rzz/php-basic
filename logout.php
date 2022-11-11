<?php

require_once "nav.php";

session_start();

$logout = $_POST['logout'];

if (!isset($_SESSION['name'])) {
    echo "<script>alert('Login First')</script>";
    echo "<script>location='index.php'</script>";
}

if (isset($logout)) {

    session_destroy();
    echo "<script>alert('user logout')</script>";
    echo "<script>location='index.php'</script>";
}

?>

<form action="" method="POST">
    <button type="submit" name="logout">Logout</button>
</form>