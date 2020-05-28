<?php 

class Router {

  static $routes = array();
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
    $r = array();

    $r["origin"] = "/".str_replace("/", "\/", $url)."/";
    // $r["origin"] = preg_replace('/([a-z0-9]+):([^\/]+)/', '${1}:(?P<${1}>${2}', $r["origin"]);

    self::$routes[] = $r;
    debug($r);
  }

  /**
   * 
   */
  static function url($url) {
    foreach(self::$routes as $v) {
      if(preg_match($v["origin"], $url, $match)) {
        debug($match);
      }
    }
    return $url;
  }

}

?>