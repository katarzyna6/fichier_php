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

echo "<p>La date de dernière mise à jour du site :$str"."<hr>";


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

/*ex.3 -----------------*/

$personnages = [
    [
        "Rose",
        12,
        1,
        100,
        false
    ],

    [
        "Golbu",
        18,
        2,
        0,
        true
    ],
    
    [
        "Arthis",
        21,
        1,
        45,
        false
    ],
];


$file3 = fopen("personnages.csv", "c+");

foreach($personnages as $perso) {
    fputcsv($file3, $perso);
}

fclose($file3);
echo "<hr>";

//Ex.4 et 5 -----------------------
?>

<?php
var_dump($_POST);

$file4 = fopen("persos.csv", "a+");
fputcsv($file4, $_POST);
fclose($file4);
?>

<!-- ex.6 -->

<?php

$file5 = fopen("persos.csv", "r");

$persos = [];
$pers_line = "";
while($pers_line !== false) {
    $pers_line = fgetcsv($file5);
    if($pers_line !== false) {
        array_push($persos, $pers_line);
    }
}

fclose($file5);

var_dump($persos);

$html = "<p>Liste des personnes : </p><ul>";
foreach($persos as $perso) {
    $html .= "<li>".$perso[0]."</li>";
}
$html .= "</ul>";
echo "<hr>";


//<!-- Ex.7 -->

$json = "";
$html = "<p>Liste des personnes : </p><ul>";
foreach($persos as &$perso) {
    $perso = ["nom" => $perso[0], "force" => $perso[1], "level" => $perso[2], "health" => $perso[3], "etat" => $perso[4]];
} 

//var_dump($persos);

$json = fopen("personnes.json", "w");
fwrite($json, json_encode(["personnes" => $persos]));
fclose($json);

$recup = json_decode(file_get_contents("personnes.json"));
var_dump($recup->personnes[0]->force);

echo "<hr>";
?>


<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Formulaire</title>
</head>
<body>

    <?= $html."<hr>" ?>


    <form action="fichier.php" method="post">
        <p>
            <label for="nom">Votre prénom: </label>
            <input type="text" id="nom" name="nom" placeholder="Votre nom">
        </p>

        <p>
            <label for="force">Votre force :</label>
            <input type="number" id="force" name="force" placeholder="Votre force">
        </p>

        <p>
            <label for="level">Votre level :</label>
            <input type="number" id="level" name="level" placeholder="Votre level">
        </p>

        <p>
            <label for="health">Votre health :</label>
            <input type="number" id="health" name="health" placeholder="Votre health">
        </p>

        <p>
            <label for="etat">Vous êtes :</label>
            <input type="text" id="etat" name="etat" placeholder="Votre état">
        </p>

        <p><input type="submit" value="Ajouter un personnage"></p><hr>

    </form>
</body>
</html>

