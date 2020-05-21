<?php

class Dispatcher {

  var $request;
  
  function __construct() {
    $this->request = new Request();
    
    // Initialise l'objet request en parsant l'url appelante
    Router::parse($this->request->url, $this->request);
    $controller = $this->loadController();
    if(!in_array($this->request->action, array_diff(get_class_methods($controller), get_class_methods("Controller")))) {
      $this->error("Le controller ".$this->request->controller." n'a pas de méthode ".$this->request->action);
    }
    // Appel de la méthode $controller->$this->request->action()
    call_user_func_array(
      array(
        $controller, $this->request->action
      ),
      $this->request->params
    );
    $controller->render($this->request->action);
  }

  function error($message) {
    $controller = new Controller($this->request);
    $controller->e404($message);
    die();
  }

  function loadController() {
    $name = ucfirst($this->request->controller)."Controller";
    $file = ROOT.DS."controller".DS.$name.".php";
    require $file;
    return new $name($this->request);
  }

}

?>