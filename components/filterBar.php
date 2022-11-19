<form action="" method="POST">
    <div>
        <input type="text" name="search" placeholder="Enter User Name">
        <button type="submit" name="searchBtn">Search</button>
    </div>
</form>

<?php

session_start();

$searchBtn = $_POST['searchBtn'];
$search = $_POST['search'];

function deleteUser($id)
{
    $db = dbConnection();
    $fetchQuery = "SELECT email from users WHERE id = '$id'";
    $result = mysqli_query($db, $fetchQuery);
    if (mysqli_num_rows($result)) {
        foreach ($result as $user) {
            if ($user['email'] == 'admin@gmail.com') {
                echo "<script>location='/?edit'</script>";
                return;
            }
        }
    }
    $query = "DELETE FROM users WHERE id=$id";
    $result = mysqli_query($db, $query);
    if ($result) {
        echo "<script>alert('Deleted successfully')</script>";
        echo "<script>location='/?home'</script>";
    }
}

$query_string = $_SERVER['QUERY_STRING'];
$id_exploder = explode("=", $query_string);
$user_id = $id_exploder[1];

if (isset($_SESSION['email']) && $_SESSION['email'] == 'admin@gmail.com') {
    if ($user_id > 0) {
        deleteUser($user_id);
    }
}

if (isset($_SESSION['email'])) {
    if ($user_id > 0) {
        echo "<script>location='/?edit'</script>";
    }
}

function tableLayout($result)
{
    echo "<h3>Total Users (" . mysqli_num_rows($result) . ")</h3>";
    echo "<table border='1' class='table'>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Password</th>";
    if (isset($_SESSION['email'])) {
        echo "<th>Actions</th>";
    }
    echo "</tr>";
}

function index()
{
    $db = dbConnection();
    $query = "SELECT * FROM users ORDER BY id DESC";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        tableLayout($result);
        foreach ($result as $user) { ?>

            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['password']; ?></td>
                <?php

                if (isset($_SESSION['email']) && $_SESSION['email'] == 'admin@gmail.com') { ?>
                    <td>
                        <?php
                        if ($user['email'] !== 'admin@gmail.com') { ?>
                            <a href="/user/?id=<?= $user['id']; ?>" class="btn deleteBtn">delete</a>
                        <?php } else { ?>
                            <a href="/?welcome" class="btn adminBtn">admin</a>
                        <?php }
                        ?>
                    </td>
                <?php }

                ?>
                <?php

                if (isset($_SESSION['email']) && $_SESSION['email'] == $user['email']) { ?>
                    <?php
                    if ($_SESSION['email'] != 'admin@gmail.com') { ?>
                        <td align="center">
                            <a href="/user/edit/?id=<?= $user['id']; ?>" class="btn editBtn">edit</a>
                        </td>
                    <?php }
                    ?>
                <?php }

                ?>
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
        tableLayout($result);
        foreach ($result as $user) { ?>

            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['password']; ?></td>
                <?php

                if (isset($_SESSION['email']) && $_SESSION['email'] == 'admin@gmail.com') { ?>
                    <td>
                        <?php
                        if ($user['email'] !== 'admin@gmail.com') { ?>
                            <a href="/user/?id=<?= $user['id']; ?>" class="btn deleteBtn">delete</a>
                        <?php } else { ?>
                            <a href="/?welcome" class="btn adminBtn">admin</a>
                        <?php }
                        ?>
                    </td>
                <?php }

                ?>

                <?php

                if (isset($_SESSION['email']) && $_SESSION['email'] == $user['email']) { ?>
                    <?php
                    if ($_SESSION['email'] != 'admin@gmail.com') { ?>
                        <td align="center">
                            <a href="/user/edit/?id=<?= $user['id']; ?>" class="btn editBtn">edit</a>
                        </td>
                    <?php }
                    ?>
                <?php }

                ?>

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

    .btn {
        text-decoration: none;
        border: 1px solid black;
        padding: 1px 5px;
        border-radius: 2px;
        color: white;
    }

    .deleteBtn {
        background-color: red;
    }

    .adminBtn {
        background-color: blue;
    }

    .editBtn {
        background-color: green;
    }
</style>