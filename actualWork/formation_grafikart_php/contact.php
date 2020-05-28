<?php 
$title = "Nous contacter";
require_once "config.php";
require_once "functions.php";
$creneaux = creneaux_html(CRENEAUX);
require "header.php"; 
?>

<div class="row">
  <div class="col-md-8">
    <h2>Nous contacter</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis laborum suscipit eos quo velit voluptatibus, 
      neque repellendus iusto eaque quam ab nostrum quasi odit. Sapiente aperiam enim aut dolorem dicta.
    </p>
  </div>
  <div class="col-md-4">
    <?= $creneaux ?>
  </div>
</div>

<?php require "footer.php"; ?>