<?php 

class Router {
  /**
   * Permet de parser une url
   * @param $url, $request : url à parser, objet request
   * @return true: initialize the request object with url parsed
   **/
  static function parse($url, $request) {
    $url = trim($url, "/");
    $params = explode("/", $url);
    $request->controller = $params[0];
    $request->action = isset($params[1]) ? $params[1] : "index";
    $request->params = array_slice($params, 2);

    return true;

  }

  /**
   * Connect
   */
  static function connect($redir, $url) {

  }

  /**
   * 
   */
  static function url($url) {
    return $url;
  }

}

?>