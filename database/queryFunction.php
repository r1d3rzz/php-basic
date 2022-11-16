<?php

session_start();

function uniqueUserDataFilter($name, $email, $password)
{
    $password = crypt(sha1(md5($password, true), true), sha1(md5($password, true)));
    $db = dbConnection();
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Your Email is Already Exits!Try Another One.')</script>";
        echo "<script>location='/?register'</script>";
    } else {
        $_SESSION['email'] = $email;
        return store($name, $email, $password);
    }
}

function store($name, $email, $password)
{
    $db = dbConnection();
    $query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
    $result = mysqli_query($db, $query);
    echo $result > 0 ? "<script>alert('Successfully Created.')</script>" : "<script>alert('Fail.')</script>";
    echo "<script>location='/'</script>";
}
