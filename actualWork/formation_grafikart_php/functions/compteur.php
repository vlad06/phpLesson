<?php

function ajouter_vue():void {
  $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "compteur";
  $fichier_journalier = $fichier . "-" . date("Y-m-d");
  incrementer_compteur($fichier);
  incrementer_compteur($fichier_journalier);
}

function incrementer_compteur(string $fichier):void {
  $compteur = 1;
  if(file_exists($fichier)) {
    $compteur = (int)file_get_contents($fichier);
    $compteur++;
  }
  file_put_contents($fichier, $compteur);
}

function nombre_vues():string {
  $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "compteur";
  return file_get_contents($fichier);
}

function nombre_vues_mois(int $annee, int $mois):int {
  $mois = str_pad($mois, 2, "0", STR_PAD_LEFT); // rajoute un 0 jusqu'a ce que la chaîne mois fasse 2 caractères
  $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "compteur-" . $annee . "-" . $mois . "-" . "*";
  $fichiers = glob($fichier);
  $total = 0;
  foreach($fichiers as $file) {
    $total += (int)file_get_contents($file);
  }
  return $total;
}

function nombre_vues_detail_mois(int $annee, int $mois):array {
  $mois = str_pad($mois, 2, "0", STR_PAD_LEFT); // rajoute un 0 jusqu'a ce que la chaîne mois fasse 2 caractères
  $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "compteur-" . $annee . "-" . $mois . "-" . "*";
  $fichiers = glob($fichier);
  $visites = [];
  foreach($fichiers as $file) {
    $parties = explode("-", basename($file));
    $visites[] = [
      "annee" => $parties[1],
      "mois" => $parties[2],
      "jour" => $parties[3],
      "visites" => file_get_contents($file)
    ];
  }
  return $visites;
}