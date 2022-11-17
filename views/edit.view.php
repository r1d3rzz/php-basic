<?php

require "../core/function.php";
require "../config.php";

session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>location='/?home'</script>";
}

$email = $_SESSION['email'];

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
        foreach ($result as $user) { ?>
            <h3 align="center">Edit Profile</h3>

            <div class="container">
                <form action="" method="POST">
                    <table border="1">
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" value="<?= $user['name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email" value="<?= $user['email']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="text" name="text" value="<?= $user['password']; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="end">
                                <a href="/?home" class="btn">Back</a>
                                <input type="submit" value="update">
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

    .container {
        display: flex;
        justify-content: center;
    }
</style>