<?php require "./components/header.php"; ?>

<?php
session_start();

if (isset($_SESSION['email'])) { ?>

    <div class="user">
        <small>Logged as : <?= $_SESSION['email']; ?></small>
    </div>

<?php }

?>

<?php require "./components/filterBar.php"; ?>

<style>
    .user {
        margin-bottom: 10px;
        color: gray;
    }
</style>