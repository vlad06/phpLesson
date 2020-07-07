<?php

class Compteur {

  const INCREMENT = 1;
  protected $fichier;
// ***********CONSTRUCTEUR****************
  public function __construct(string $fichier) {
    $this->fichier = $fichier;
  }
// *****************METHODES DE CLASSE***************
  public function incrementer():void {
    $compteur = 1;
    if(file_exists($this->fichier)) {
      $compteur = (int)file_get_contents($this->fichier);
      $compteur += static::INCREMENT;
    }
    file_put_contents($this->fichier, $compteur);
  }

  public function recuperer():int {
    if(file_exists($this->fichier)) {
      return (int)file_get_contents($this->fichier);
    }
    return 0;
  }



}