<!-- <?php
// $nom = null;
// if(!empty($_GET["action"]) && $_GET["action"] === "deconnecter") {
//   unset($_COOKIE["utilisateur"]);               // unset permet de supprimer une variable (ici un élément du tableau $_COOKIE)
//   setcookie("utilisateur", "", time() - 10);    // pour supprimer un cookie on lui applique une date d'expiration dans le passé
// }
// if(!empty($_COOKIE["utilisateur"])) {
//   $nom = $_COOKIE["utilisateur"];
// }
// if(!empty($_POST["nom"])) {
//   setcookie("utilisateur", $_POST["nom"]);
//   $nom = $_POST["nom"];
// }
// require "elements/header.php";
?> -->

<?php
$utilisateur = $_COOKIE["utilisateur"];
var_dump(unserialize($utilisateur));
$user = [
  "prenom" => "John",
  "nom" => "Doe",
  "age" => 18
];
setcookie("utilisateur", serialize($user));
// var_dump(serialize($user));
// echo "<br>";
// var_dump(json_encode($user));
// echo "<br>";
// var_dump((array)json_decode(json_encode($user)));
// echo "<br>";
// var_dump($user);

require "elements/header.php";
?>

<?php if($nom): ?>
  <h1>Bonjour <?= htmlentities($nom) ?></h1>
  <a href="profil.php?action=deconnecter">Se déconnecter</a>
<?php else: ?>
  <form action="" method="post">
    <div class="form-group">
      <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom">
    </div>
    <button class="btn btn-primary">Se connecter</button>
  </form>
<?php endif; ?>

<?php
require "elements/footer.php";
?>