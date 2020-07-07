<?php
$dsn = "mysql:dbname=grafikart;host=localhost";
$user = "root";
$password = "Jesuis1d1gue";

$pdo = new PDO($dsn, $user, $password, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;
$success = null;

try {
  if(isset($_POST["name"], $_POST["content"])) {
    $query = $pdo->prepare("UPDATE posts set name = :name, content = :content where id = :id");
    $query->execute([
      "name" => $_POST["name"],
      "content" => $_POST["content"],
      "id" => $_GET["id"]
    ]);
    $success = "Votre article à bien été modifié";
  }
  $query = $pdo->prepare("SELECT * from posts where id = :id");
  $query->execute([
    "id" => $_GET["id"]
  ]);
  $post = $query->fetch();
} catch(PDOException $e) {
  $error = $e->getMessage();
}

require "../elements/header.php";
?>

<div class="container">

  <p>
    <a href="../blog/">Revenir au listing</a>
  </p>
  <?php if($success): ?>
    <div class="alert alert-success">
      <?=$success ?>
    </div>
  <?php endif; ?>
  <?php if($error): ?>
    <div class="alert alert-danger">
      <?= $error ?>
    </div>
  <?php else: ?>
  <ul>
    <form action="" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="name" value="<?= htmlentities($post->name) ?>">
      </div>
      <div class="form-group">
        <textarea type="text" class="form-control" name="content"><?= htmlentities($post->content) ?></textarea>
      </div>
      <button class="btn btn-primary">Sauvegarder</button>
    </form>
  </ul>
  <?php endif ?>
</div>





<?php
require "../elements/footer.php";
?>