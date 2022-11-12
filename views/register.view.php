<?php

error_reporting(1);

require "../config.php";
require "../database/queryFunction.php";

function dbConnection()
{
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!mysqli_errno($db) > 0) {
        return $db;
    }
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$register = $_POST['register'];

if (isset($register)) {
    if ($name == '' || $email == '' || $password == '') {
        echo "<script>alert('Please Enter Name,Email and Password')</script>";
    } else {
        uniqueUserDataFilter($name, $email, $password);
    }
}

?>
<?php require "../components/header.php"; ?>

<div class="formContainer">
    <form action="" method="POST" class="registerContainer">
        <table border="1">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="end">
                    <input type="reset" value="Cancel">
                    <input type="submit" value="Register" name="register">
                </td>
            </tr>
        </table>
    </form>
</div>

<style>
    .formContainer {
        display: flex;
        justify-content: center;
    }
</style>

<?php require "../components/footer.php"; ?>