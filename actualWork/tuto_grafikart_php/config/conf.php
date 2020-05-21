<?php

class Conf {

  static $debug = 1;

  static $databases = array(
    "default" => array(
        "host"     => "localhost",
        "database" => "tuto",
        "login"    => "root",
        "password" => "Jesuis1d1gue"
    )
  );

}

Router::connect("post/:slug-:id", "posts/view/id:([0-9]+)/slug:([a-z0-9\-]+)");



?>