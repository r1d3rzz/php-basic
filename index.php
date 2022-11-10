<?php

function generateCookie()
{
    setcookie('name', 'Hello My name is Cookie', time() + 50, '/');
}

function getCookie()
{
    if (!isset($_COOKIE['name'])) {
        echo "Cookie not set!";
    } else {
        echo $_COOKIE['name'];
    }
}

function deleteCookie()
{
    setcookie('name', '', time() - 50, '/');
}

if (isset($_POST['setCookie'])) {
    generateCookie();
} else if (isset($_POST['clearCookie'])) {
    deleteCookie();
}

getCookie();

?>

<form action="" method="POST">
    <table>
        <tr>
            <td><input type="submit" value="setCookie" name="setCookie"></td>
            <td><input type="submit" value="clearCookie" name="clearCookie"></td>
        </tr>
    </table>
</form>