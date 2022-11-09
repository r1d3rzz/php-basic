<?php

function createDocs ($filename,$data) {
    $handler = fopen($filename,'w');
    fwrite($handler,$data);
    fclose($handler);
}

function readDocs ($filename) {
    $handler = fopen($filename,'r');
    $data = fread($handler,filesize($filename));
    fclose($handler);
    return $data;
}

function appendDocs ($filename,$data) {
    $handler = fopen($filename,'a');
    fwrite($handler,$data);
    fclose($handler);
}