<?php

class PostsController extends Controller {

  function index() {
    $perPage = 1;
    $this->loadModel("Post");
    $condition = array("online" => 1, "type" => "post");
    $d["posts"] = $this->Post->find(array(
      "conditions" => $condition,
      "limit" => ($perPage * ($this->request->page - 1)).",".$perPage
    ));
    $d["total"] = $this->Post->findCount($condition);
    $d["page"] = ceil($d["total"] / $perPage);
    $this->set($d);
  }
  function view($id) {
    
    $this->loadModel("Post");
    $d["page"] = $this->Post->findFirst(array(
      "conditions" => array("online" => 1, "id" => $id, "type" => "post")
    ));
    if(empty($d["page"])) {
      $this->e404("Page introuvable");
    }
    $this->set($d);
  }
}

?>
