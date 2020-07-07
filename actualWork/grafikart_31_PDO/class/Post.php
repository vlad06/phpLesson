<?php

class Post {

  public $id;
  public $name;
  public $content;
  public $created_at;

  public function __construct() {

    if(is_int(strtotime($this->created_at))) {
      $this->created_at = new DateTime("@" . strtotime($this->created_at));
    }
  }
  
  public function getExcerpt(): string {
    return substr($this->content, 0, 150);
  }
}