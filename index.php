<?php

$password = "password";

echo "Original Value = " . $password . "<br/>";
echo "<br/>";
echo "md5 false = " . md5($password, false) . "<br/>";
echo "<br/>";
echo "md5 true = " . md5($password, true) . "<br/>";
echo "<br/>";
echo "sha1 false = " . sha1($password, false) . "<br/>";
echo "<br/>";
echo "sha1 true = " . sha1($password, true) . "<br/>";
echo "<br/>";
echo "crypt = " . crypt($password, $password) . "<br/>";
echo "<br/>";
echo "all combine = " . crypt(sha1(md5($password, true)), $password) . "<br/>";
echo "<br/>";
echo "all combine extra* = " . crypt(sha1(md5($password, true), true), sha1(md5($password))) . "<br/>";
