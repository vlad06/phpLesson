<?php

function nav_item(string $link, string $title, string $linkClass = ""):string {
  $class = "nav-item";
  if($_SERVER["SCRIPT_NAME"] === $link) {
    $class = $class . " active";
  }
  // merci heredoc
  return <<<HTML
    <li class="$class">
      <a class="nav-link" href="$link">$title</a>
    </li>
  HTML;
}

function nav_menu(string $linkClass = ""):string {

  return
    nav_item("/index.php", "Accueil", $linkClass) .
    nav_item("/contact.php", "Contact", $linkClass);
}

function checkbox(string $name, string $value, array $data):string {

  $attributes = "";
  if(isset($data[$name]) && in_array($value, $data[$name])) {
    $attributes .= "checked";
  }
  return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attributes>
  HTML;
}

function radio(string $name, string $value, array $data):string {

  $attributes = "";
  if(isset($data[$name]) && $value === $data[$name]) {
    $attributes .= "checked";
  }
  return <<<HTML
    <input type="radio" name="$name" value="$value" $attributes>
  HTML;
}

function dump($variable) {
  echo "<pre>";
  var_dump($variable);
  echo "</pre>";
}

function creneaux_html(array $creneaux) {
  $horaires = "Ouvert de {$creneaux[0][0]} à {$creneaux[0][1]} et de {$creneaux[1][0]} à {$creneaux[1][1]}";
  return $horaires;
}

?>