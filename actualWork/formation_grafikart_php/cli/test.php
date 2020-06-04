<?php

/**
 * POUR CREER ET ECRIRE DANS UN FICHIER :
 */
// var_dump(dirname(__DIR__, 3));
// exit();
// $fichier = __DIR__ . DIRECTORY_SEPARATOR . "demo.txt";
// // $size = file_put_contents($fichier, " Salut les gens", FILE_APPEND);
// // le @ devant un nom de fonction est le mode silencieux et 
// // n'affiche pas les erreurs si il y en à 
// $size = @file_put_contents($fichier, " Salut les gens", FILE_APPEND);
// if($size === false) {
//   echo "Impossible d'écrire dans le fichier";
// } else {
//   echo "Ecriture réussie";
// }

/**
 * POUR LIRE DANS UN FICHIER :
 */
$fichier = __DIR__ . DIRECTORY_SEPARATOR . "demo.txt";
echo file_get_contents($fichier);

?>