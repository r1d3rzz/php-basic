<?php

error_reporting(1);

require "../config.php";
require "../core/function.php";

function dbConnection()
{
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!mysqli_errno($db) > 0) {
        return $db;
    }
}

$submit = $_POST['submit'];
$email = $_POST['email'];
$password = $_POST['password'];

if (isset($submit)) {
    $db = dbConnection();
    $query = "SELECT email from users WHERE email='$email'";
    $result = mysqli_query($db, $query);
    if (!mysqli_num_rows($result) > 0) {
        echo "<script>alert('Your Email Is Not Exists!')</script>";
        echo "<script>location='/?forgot_password'</script>";
    } else {
        if ($password !== '') {
            $password = crypt(sha1(md5($password, true), true), sha1(md5($password, true)));
            $update_query = "UPDATE users SET password='$password' WHERE email = '$email'";
            $update_result = mysqli_query($db, $update_query);
            if ($update_query) {
                echo "<script>alert('Successfully Updated.')</script>";
                echo "<script>location='/?login'</script>";
            } else {
                echo "<script>alert('Server Error')</script>";
                echo "<script>location='/?forgot_password'</script>";
            }
        } else {
            echo "<script>alert('Please Fill Password Input')</script>";
            echo "<script>location='/?forgot_password'</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>

<body>

    <div style="margin-top: 120px;">
        <h2 align="center" style="font-family: sans-serif;">Reset Your Account Password</h2>
        <div class="container">
            <form action="" method="POST">
                <table border="1">
                    <tr>
                        <td>Enter Your Email</td>
                        <td><input type="email" name="email" id="" required></td>
                    </tr>
                    <tr>
                        <td>New Password</td>
                        <td><input type="text" name="password" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="end">
                            <a href="/?login" class="homeBtn">Back</a>
                            <input type="submit" value="confirm" name="submit">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</body>

</html>

<style>
    .container {
        display: flex;
        justify-content: center;
    }

    .homeBtn {
        text-decoration: none;
        border: 1px solid red;
        padding: 2.5px 5px;
        background-color: blue;
        color: white;
        border-radius: 2px;
        margin-right: 3px;
    }
</style>