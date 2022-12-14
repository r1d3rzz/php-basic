<?php

error_reporting(1);

session_start();

if (isset($_SESSION['email'])) {
    echo "<script>location='/?home'</script>";
}

require "../core/function.php";

require "../config.php";

function dbConnection()
{
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!mysqli_errno($db) > 0) {
        return $db;
    }
}

function passwordUnCrybt($password)
{
    return crypt(sha1(md5($password, true), true), sha1(md5($password, true)));
}

$email = $_POST['email'];
$password = $_POST['password'];
$login = $_POST['login'];

function login($email, $password)
{
    $password = passwordUnCrybt($password);
    $db = dbConnection();
    $query = "SELECT * FROM users WHERE email='$email' && password='$password'";
    $result = mysqli_query($db, $query);
    if (!mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email or Password is Wrong!')</script>";
        echo "<script>location='/?login'</script>";
    } else {
        $_SESSION['email'] = $email;
        echo "<script>location='/?welcome'</script>";
    }
}

if (isset($login)) {
    if ($email == '' || $password == '') {
        echo "<script>alert('Please Fill Email and Password')</script>";
        echo "<script>location='/?login'</script>";
    } else {
        login($email, $password);
    }
}

?>

<?php require "../components/header.php"; ?>

<div class="loginContainer">
    <form action="" method="POST">
        <h3>Login Here</h3>
        <table border="1">
            <tr>
                <td align="end"><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email" value="<?= $_COOKIE['email']; ?>"></td>
            </tr>
            <tr>
                <td><label for="pass">Password</label></td>
                <td><input type="password" name="password" id="pass" value="<?= $_COOKIE['password']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="end"><input type="submit" value="Login" name="login"></td>
            </tr>
        </table>
        <p><b><a href="/?forgot_password" class="forgotPassword">Forgot password?</a></b></p>
        <p>If you have no Account? <a href="./register.view.php">Register</a> Here.</p>
    </form>
</div>

<?php require "../components/footer.php"; ?>

<style>
    .loginContainer {
        display: flex;
        justify-content: center;
    }

    .forgotPassword {
        text-decoration: none;
        font-family: sans-serif;
    }
</style>