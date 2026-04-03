<?php

$num;

function calcule($carre, $b = 1) {
    $Mambo = $carre **2 * $b;
    return $Mambo;
}

echo calcule(10);
echo "<br>";
echo calcule(5,4);
echo "<br>";

// exo 2
function calcMoyenne($a, $b, $c) {
    $add = $a + $b + $c;
    $result = $add / 3;
    return $result;
}
$notu = calcMoyenne(16.9, 15.4, 19.5);
$notu = round($notu, 2);
function calcNote($name, $note) {
    if ($note >= 10) {
        echo "$name Exellent ";
    } else if ($note < 10) {
        echo "$name Insuffisant ";
    }
}

echo "<br>";
calcNote("Alice", $notu);
echo $notu;
?>