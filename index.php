<?php

require_once "nav.php";

session_start();

$name = $_POST['name'];
$password = $_POST['password'];
$login = $_POST['login'];

if (isset($login)) {
    if ($name == 'Rider' && $password == 'rider') {
        $_SESSION['name'] = $name;
        header('location:profile.php');
    } else {
        echo "<script>alert('wrong password or username')</script>";
    }
}

?>

<form action="" method="POST" class="inputContainer">
    <h3>Login Page</h3>

    <div class="inputValue">
        <div>Username => Rider</div>
        <div>Password => rider</div>
    </div>

    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id=""></td>
        </tr>
        <tr>
            <td colspan="2" align="end"><input type="submit" value="Login" name="login"></td>
        </tr>
    </table>
</form>

<style>
    .inputContainer {
        margin-top: 30px;
    }

    .inputValue {
        border: 1px solid cyan;
        width: 150px;
        text-align: center;
        padding: 10px 0;
        margin-bottom: 20px;
        border-radius: 5px;
        box-shadow: 6px 6px 10px black;
    }
</style>