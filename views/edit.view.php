<?php

error_reporting(1);

require "../core/function.php";
require "../config.php";

session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>location='/?home'</script>";
}

$email = $_SESSION['email'];

$newName = $_POST['name'];
$newPassword = $_POST['password'];
$updateBtn = $_POST['updateBtn'];

function connectDb()
{
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!mysqli_errno($db) > 0) {
        return $db;
    }
}

function fetchSingleData($email)
{
    $db = connectDb();
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $user) {
            $_SESSION['password'] = $user['password']; ?>
            <h3 align="center">Edit Profile</h3>

            <div class="loggedEmailContainer">
                <small>Logged as <?= $user['email']; ?></small>
            </div>

            <div class="container">
                <form action="" method="POST">
                    <table border="1">
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" value="<?= $user['name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="text" name="password" placeholder="(optional)"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="end">
                                <a href="/?home" class="btn">Back</a>
                                <input type="submit" value="update" name="updateBtn">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
<?php }
    }
}

fetchSingleData($email);

?>

<style>
    .btn {
        text-decoration: none;
        border: 1px solid transparent;
        padding: 1px 5px;
        color: white;
        background-color: blue;
    }

    .loggedEmailContainer {
        border: 1px solid transparent;
        border-radius: 3px;
        box-shadow: 5px 5px 10px gray;
        width: 220px;
        text-align: center;
        margin: 0 auto;
        margin-bottom: 20px;
        padding: 10px;
        color: gray;
    }

    .container {
        display: flex;
        justify-content: center;
    }
</style>

<?php

$password = $_SESSION['password'];
$db = connectDb();

function UpdateNoti($result)
{
    if ($result) {
        echo "<script>alert('Successfully Updated')</script>";
        echo "<script>location='/?welcome'</script>";
    } else {
        echo "<script>alert('Something Wrong!')</script>";
        echo "<script>location='/?edit'</script>";
    }
}

if (isset($updateBtn)) {
    if ($newPassword !== '') {
        //with pass
        $newPassword = crypt(sha1(md5($newPassword, true), true), sha1(md5($newPassword, true)));
        $query = "UPDATE users SET name='$newName',email='$email',password='$newPassword' WHERE email = '$email'";
        $result = mysqli_query($db, $query);
        UpdateNoti($result);
    } else {
        //without pass
        $query = "UPDATE users SET name='$newName',email='$email',password='$password' WHERE email = '$email'";
        $result = mysqli_query($db, $query);
        UpdateNoti($result);
    }
}

?>