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



$file2=fopen("compteur.txt", "r+");
$pages = fgets($file2);
$pages++;
fseek($file2,0);
fwrite($file2, $pages);
fclose($file2);
echo '<p>Nombre de vues : ' . $pages . '.</p>';

