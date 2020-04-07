<?php

$file = fopen("misesajour.txt", "r");

var_dump(fgets($file));

$str = "";
while($str !== false) {
    $str = fgets($file);
    var_dump($str);
}


fclose($file);