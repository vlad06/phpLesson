<?php

require dirname(__DIR__) . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . "Creneau.php";

$creneau = new Creneau(9, 12);
$creneau2 = new Creneau(8, 13);
$creneau->intersect($creneau2);

// var_dump($creneau);
// var_dump($creneau2);
// var_dump(
//   $creneau->inclusHeure(10),
//   $creneau2->inclusHeure(12)
// );
// var_dump($creneau->intersect($creneau2));
echo $creneau->toHTML();