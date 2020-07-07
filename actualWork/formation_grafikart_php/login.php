<?php
$erreur = null;
$password = '$2y$14$ZgLocYfkL9iJsPuUQIZ48uUa7GaeyS.rY5i1ZO.qViA4f720Evy2K';
if(!empty($_POST["pseudo"]) && !empty($_POST["motdepasse"])) {
  if($_POST["pseudo"] === "John" && password_verify($_POST["motdepasse"], $password)) {
    session_start();
    $_SESSION["connecte"] = 1;
    header("Location: dashboard.php");
  } else {
    $erreur = "Identifiants incorrects";
  }
}

require_once "functions/auth.php";
if(est_connecte()) {
  header("Location: dashboard.php");
  exit();
}
require_once "elements/header.php";
?>
<?php if($erreur): ?>
  <div class="alert alert-danger">
    <?= $erreur ?>
  </div>
<?php endif; ?>
<form action="" method="post">
  <div class="form-group">
    <input class="form-control" type="text" name="pseudo" placeholder="Nom d'utilisateur">
  </div>
  <div class="form-group">
    <input class="form-control" type="password" name="motdepasse" placeholder="Votre mot de passe" >
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php
require "elements/footer.php";
?>