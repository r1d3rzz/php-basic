<?php

error_reporting(1);

session_start();

if (!isset($_SESSION['name'])) {
    header('location:index.php');
}

$logout = $_POST['logout'];

if (isset($logout)) {
    session_destroy();
    echo "<script>alert('User Logout')</script>";
    echo "<script>location='index.php'</script>";
}

?>


<h1>Welcome <?= $_SESSION['name']; ?></h1>

<form action="" method="POST">
    <button type="submit" name="logout">Logout</button>
</form>