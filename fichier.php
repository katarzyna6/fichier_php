<?php

$file = fopen("misesajour.txt", "c");

fwrite($file, "La date de dernière mise à jour du site :".PHP_EOL);

fwrite($file, "2020-04-07".PHP_EOL);






fclose($file);