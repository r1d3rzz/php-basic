<form action="" method="POST">
    <div>
        <input type="text" name="search" placeholder="Enter User Name">
        <button type="submit" name="searchBtn">Search</button>
    </div>
</form>

<?php

$searchBtn = $_POST['searchBtn'];
$search = $_POST['search'];

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

?>

<?php

function filterUserByName($name)
{
    $db = dbConnection();
    $query = "SELECT * FROM users WHERE name LIKE '%$name%'";
    $result = mysqli_query($db, $query);
    if (!mysqli_num_rows($result) > 0) {
        echo "<script>alert('User Not Found!')</script>";
        index();
    } else {
        echo "<h3>Total Users (" . mysqli_num_rows($result) . ")</h3>";
        foreach ($result as $user) { ?>

            <div class="userContainer">
                <div>Id : <?= $user['id']; ?></div>
                <div>Name : <?= $user['name']; ?></div>
                <div>Email : <?= $user['email']; ?></div>
                <div>Password : <?= $user['password']; ?></div>
            </div>

<?php }
    }
}

if (isset($searchBtn)) {
    filterUserByName($search);
} else {
    index();
}

?>

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