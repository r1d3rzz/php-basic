<?php

error_reporting(1);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'test');

function dd($data)
{
    echo "<pre>";
    die(print_r($data, true));
}

function dbConnect()
{
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!mysqli_errno($db) > 0) {
        return $db;
    };
}

function excuteQuery($query)
{
    $result = mysqli_query(dbConnect(), $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<h3>Total Users (" . mysqli_num_rows($result) . ")</h3>";
        foreach ($result as $item) {
            echo 'Id = ' . $item['id'] . "<br/>";
            echo 'Name = ' . $item['name'] . "<br/>";
            echo 'Email = ' . $item['email'] . "<br/>";
            echo 'Password = ' . $item['password'] . "<br/>";
            echo "<hr/>";
        }
    }
}

function singleData($id)
{
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query(dbConnect(), $query);
    if (!mysqli_num_rows($result) > 0) {
        echo "<h3>User Id = $id not Found</h3>";
    }
    if (mysqli_num_rows($result) > 0) {
        echo "<h3>Total Users (" . mysqli_num_rows($result) . ")</h3>";
        foreach ($result as $item) {
            echo 'Id = ' . $item['id'] . "<br/>";
            echo 'Name = ' . $item['name'] . "<br/>";
            echo 'Email = ' . $item['email'] . "<br/>";
            echo 'Password = ' . $item['password'] . "<br/>";
            echo "<hr/>";
        }
    }
}



$id = $_POST['id'];
$search = $_POST['search'];
if (isset($search)) {
    if ($id == '') {
        $query = 'SELECT * FROM users';
        excuteQuery($query);
    } else {
        singleData($id);
    }
}


?>

<form action="" method="POST">
    <table border="1">
        <tr>
            <td>Enter User ID</td>
            <td><input type="number" name="id"></td>
        </tr>
        <tr>
            <td colspan="2" align="end">
                <input type="submit" value="Search" name="search">
            </td>
        </tr>
    </table>
</form>