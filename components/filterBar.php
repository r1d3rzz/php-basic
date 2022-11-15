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
    $query = "SELECT * FROM users ORDER BY id DESC";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<h3>Total Users (" . mysqli_num_rows($result) . ")</h3>";
        echo "<table border='1' class='table'>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Password</th>";
        echo "</tr>";
        foreach ($result as $user) { ?>

            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['password']; ?></td>
            </tr>

<?php };
        echo "</table>";
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
        echo "<table border='1' class='table'>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Password</th>";
        echo "</tr>";
        foreach ($result as $user) { ?>

            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['password']; ?></td>
            </tr>

<?php }
        echo "</table>";
    }
}

if (isset($searchBtn)) {
    if ($search == '') {
        index();
    } else {
        filterUserByName($search);
    }
} else {
    index();
}

?>

<style>
    .table {
        margin: 0 auto;
        text-align: start;
    }

    td {
        padding: 5px;
    }
</style>