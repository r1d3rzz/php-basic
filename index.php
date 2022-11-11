<?php

$name = "Rider";
$age = 22;

// ------------Diff between printf and fprintf------------

// printf("Hello My name is %s and age is %u years old.", $name, $age);

// $handler = fopen('text.txt', 'w');
// fprintf($handler, 'Hello my name is %s and age is %u years old.', $name, $age);
// fclose($handler);

//Create XML File

$file = "text.xml";

$xmlText = [
    'name' => 'rider',
    'age' => 22,
    'gender' => 'male',
    'job' => 'studends',
    'code' => 'php'
];

$str = "";

$str .= "<program>";
foreach ($xmlText as $key => $val) {
    $str .= "<" . $key . ">";
    $str .=   $val;
    $str .= "</" . $key . ">";
};
$str .= "</program>";

$handler = fopen($file, 'w');
fprintf($handler, '%s', $str);
fclose($handler);

$xml = simplexml_load_file('text.xml');

foreach ($xml as $key => $val) {
    echo $key . " = " . $val . "<br/>";
}
