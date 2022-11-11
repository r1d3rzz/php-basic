<?php

require_once "nav.php";

session_start();

if (!isset($_SESSION['name'])) {
    echo "<script>alert('Login First')</script>";
    echo "<script>location='index.php'</script>";
}

echo "Welcome " . $_SESSION['name'];

?>

<h3>Profile</h3>