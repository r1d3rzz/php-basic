<?php

require_once "nav.php";

session_start();

$buyBtn = $_POST['buyBtn'];

if (isset($buyBtn)) {
    if (!isset($_SESSION['name'])) {
        echo "<script>alert('login first')</script>";
        echo "<script>location='index.php'</script>";
    } else {
        echo "Thanks for buying my product " . $_SESSION['name'];
    }
}

?>

<h3>Products</h3>

<form action="" method="POST">
    <button type="submit" name="buyBtn">Buy Item</button>
</form>