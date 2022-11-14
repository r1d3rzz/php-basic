<?php

error_reporting(1);

require "../core/function.php";

$logout = $_POST['logout'];

if (isset($logout)) {
    header('location: ./login.view.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>

<body>
    <h1>Hello User</h1>
    <form action="" method="POST">
        <input type="submit" value="Logout" name="logout">
    </form>
</body>

</html>