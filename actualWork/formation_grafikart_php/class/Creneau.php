<?php

class Creneau {

  // ************PROPRIETES***************
  public $debut;
  public $fin;

  // ***********CONSTRUCTEUR**************
  public function __construct(int $debut, int $fin) {
    $this->debut = $debut;
    $this->fin = $fin;
  }

  // ************METHODES DE CLASSE**************
  //
  public function toHTML():string {
    return "<strong>{$this->debut}h</strong> à <strong>{$this->fin}h</strong>";
  }
  // vérifie si une heure passée en paramètre est dans un créneau
  public function inclusHeure(int $heure):bool {
    return $heure >= $this->debut && $heure <= $this->fin;
  }
  // vérifie si un créneau empiète sur un autre
  public function intersect(Creneau $creneau):bool {
    return $this->inclusHeure($creneau->debut) ||
      $this->inclusHeure($creneau->fin) ||
      ($this->debut > $creneau->debut && $this->fin < $creneau->fin);
  }

}


?>