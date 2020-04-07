<?php

$file = fopen("misesajour.txt", "r");

$str = fgets($file);

/*var_dump(fgets($file));

$str = "";
while($str !== false) {
    $str = fgets($file);
    var_dump($str);
}*/

fclose($file);

echo "<p>La date de dernière mise à jour du site :$str";



$file2=fopen("compteur.txt", "c+");
$line = fgets($file2);
var_dump($line);

$count = ($line)? $line + 1 : 1;
var_dump($count);

fseek($file2, 0);
fwrite($file2, $count);
fclose($file2);


/*$pages = fgets($file2);
var_dump($page);
$pages++;
fseek($file2,0);
fwrite($file2, $pages);
fclose($file2);
echo '<p>Nombre de vues : ' . $pages . '.</p>';*/

