<?php

require "./function.php";

error_reporting(1);

$submit = $_POST['submit'];

if(isset($submit)){
    $name = $_POST['name'];
    $type = $_POST['f_type'];
    $filename = $name.$type;
    $data = $_POST['body'];

    if(file_exists($filename)){
        appendDocs($filename,$data);
    }else{
        createDocs($filename,$data);
    }

    echo readDocs($filename);
}


?>

<form action="" method="POST" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td>File Name</td>
            <td>
                <input type="input" name="name">
                <select name="f_type">
                    <option value=".txt">txt</option>
                    <option value=".html">html</option>
                    <option value=".js">txt</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Body</td>
            <td>
                <textarea placeholder="type here" name="body" rows="5" cols="30"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="end">
                <input type="submit" value="create" name="submit">
            </td>
        </tr>
    </table>
</form>