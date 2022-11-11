<?php

$file = "text.txt"; //test with change file variable value eg.tests.txt so that u can see the error Handling Effect

// Three Types of Handling => die , exit, try & catch

//using exit();
// if (!file_exists($file)) {
//     exit('File not Exits');
// }


//using die();
// if (!file_exists($file)) {
//     die('File not Exits');
// }


//using try and catch 
try {
    if (file_exists($file)) {
        $handler = fopen($file, 'r');
        $fileText = fread($handler, filesize($file));
        fclose($handler);
        echo $fileText;
    } else {
        throw new Exception('File not Found!');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
