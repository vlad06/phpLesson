<?php

class Controller {
  
  public $request;
  public $layout = "default";

  private $vars = array();
  private $rendered = false;

  /**
   * @param $request : objet request de notre application
   */
  function __construct($request) {
    $this->request = $request;
  }

  /**
   * Permet de rendre une vue
   * @param $view Fichier à rendre (chemin depuis view ou nom de la vue)
   */
  public function render($view) {
    if($this->rendered) { 
      return false; 
    }
    extract($this->vars);
    if(strpos($view, "/") === 0) {
      $view = ROOT.DS."view".$view.".php";
    } else {
      $view = ROOT.DS."view".DS.$this->request->controller.DS.$view.".php"; 
    }
    ob_start();
    require($view);
    $content_for_layout = ob_get_clean();
    require ROOT.DS."view".DS."layout".DS.$this->layout.".php";
    $this->rendered = true;
  }

  /**
   * Permet de passer une ou plusieurs variables à la vue
   * @param $key : nom de la variable ou tableau de variables
   * @param $value : valeur de la variable
   */
  public function set($key, $value=null) {
    if(is_array($key)) {
      $this->vars += $key;
    } else {
      $this->vars[$key] = $value;
    }
    
  }
  /**
   * Permet de charger un model
   * @param $name : nom du modèle à charger
   */
  function loadModel($name) {
    $file = ROOT.DS."model".DS.$name.".php";
    require_once($file);
    if(!isset($this->$name)) {
      $this->$name = new $name();
    }
  }
  /**
   * Permet de gérer les erreurs 404
   */
  function e404($message) {
    header("HTTP/1.0 404 Not Found");
    $this->set("message", $message);
    $this->render("/errors/404");
    die();
  }

}

?>