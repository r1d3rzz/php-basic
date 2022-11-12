<?php require "./components/header.php"; ?>

<?php

function index()
{
    $db = dbConnection();
    $query = "SELECT * FROM users";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<h3>Total Users (" . mysqli_num_rows($result) . ")</h3>";

        foreach ($result as $user) { ?>

            <div class="userContainer">
                <div>Id : <?= $user['id']; ?></div>
                <div>Name : <?= $user['name']; ?></div>
                <div>Email : <?= $user['email']; ?></div>
                <div>Password : <?= $user['password']; ?></div>
            </div>

<?php };
    } else {
        echo "<h3>Empty Users</h3>";
    }
}

index();

?>

<?php require "./components/footer.php"; ?>

<style>
    .userContainer {
        border: 1px solid cyan;
        border-radius: 5px;
        text-align: start;
        padding: 10px;
        width: 250px;
        margin: 10px auto;
        box-shadow: 5px 5px 9px gray;
    }
</style>