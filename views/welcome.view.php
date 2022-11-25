<?php

error_reporting(1);

session_start();

require "../core/function.php";

require "../config.php";

require "../components/navbar.php";

$email = $_SESSION['email'];
$isDelete = $_POST['deleteBtn'];

function dbConnection()
{
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!mysqli_errno($db) > 0) {
        return $db;
    }
}


if (isset($isDelete)) {
    $db = dbConnection();
    $query = "DELETE FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);
    if ($result) {
        session_destroy();
        echo "<script>alert('Deleted Successfully')</script>";
        echo "<script>location='/?home'</script>";
    }
}

function fetchSingleUserData($email)
{
    $db = dbConnection();
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);
    if (!isset($_SESSION['email'])) {
        echo "<script>alert('User Not Found!')</script>";
        echo "<script>location='/?login'</script>";
    } else {
        if (!mysqli_num_rows($result) > 0) {
            echo "<script>alert('User Not Found!')</script>";
            echo "<script>location='/?login'</script>";
        } else {
            foreach ($result as $user) { ?>

                <div class="container">
                    <div class="title">Welome <?= $user['name']; ?></div>
                    <div><small class="muted">Logged as : <?= $user['email']; ?></small></div>
                    <div class="actionBtn">
                        <div>
                            <form action="" method="POST">
                                <button type="submit" name="deleteBtn" class="btn deleteBtn">Delete Account</button>
                            </form>
                        </div>
                        <div><a href="/user/edit/?id=<?= $user['id']; ?>" class="btn editBtn">edit</a></div>
                    </div>
                </div>

                <div class="btn">
                    <form action="" method="POST">
                        <input type="submit" value="Logout" name="logout">
                    </form>
                </div>

<?php }
        }
    }
}

fetchSingleUserData($email);

$logout = $_POST['logout'];

if (isset($logout)) {
    session_destroy();
    echo "<script>alert('User Logout')</script>";
    echo "<script>location='/?home'</script>";
}

?>

<style>
    .container {
        margin: 0 auto;
        margin-bottom: 20px;
        border: 1px solid cyan;
        width: 250px;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 5px 5px 10px gray;
    }

    .title {
        font-weight: bold;
        margin: 5px 0;
        font-family: sans-serif;
    }

    .actionBtn {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .muted {
        color: gray;
    }

    .btn {
        display: flex;
        text-decoration: none;
        justify-content: center;
        color: white;
        padding: 2.5px 5px;
        border-radius: 3px;
        user-select: none;
        cursor: pointer;
    }

    .editBtn {
        background-color: blue;
    }

    .deleteBtn {
        background-color: red;
    }
</style>