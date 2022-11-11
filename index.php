<?php

error_reporting(1);

session_start();

$name = $_POST['name'];
$pass = $_POST['pass'];
$login = $_POST['login'];
$checked = $_POST['checked'];


if (isset($login)) {
    if ($name == 'Rider' && $pass == "rider") {
        $_SESSION['name'] = $name;
        if ($checked) {
            setcookie('name', $name, time() + 20, '/');
            setcookie('pass', $pass, time() + 20, '/');
        }
        header('location:welcome.php');
    } else {
        echo "<script>alert('Wrong Password or Username')</script>";
        echo "<script>location='index.php'</script>";
    }
}

?>

<div class="inputValue">
    <div>Username => Rider</div>
    <div>Password => rider</div>
    <div>Cookie Expire Time => 20s</div>
</div>

<form action="" method="POST">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="name" id="" value="<?= $_COOKIE['name']; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass" id="" value="<?= $_COOKIE['pass']; ?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="end"><input type="submit" value="Login" name="login"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <div class="checkContainer">
                    <div><input type="checkbox" name="checked" id="check"></div>
                    <div><label for="check">remember me?</label></div>
                </div>
            </td>
        </tr>
    </table>
</form>

<style>
    .checkContainer {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .inputValue {
        border: 1px solid cyan;
        width: 200px;
        text-align: start;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        box-shadow: 6px 6px 10px black;
    }
</style>