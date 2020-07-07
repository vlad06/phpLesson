<?php
require_once "../class/Post.php";

$dsn = "mysql:dbname=grafikart;host=localhost";
$user = "root";
$password = "Jesuis1d1gue";

$pdo = new PDO($dsn, $user, $password, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;

try {
  if(isset($_POST["name"], $_POST["content"])) {
    $query = $pdo->prepare("INSERT into posts (name, content, created_at) VALUES (:name, :content, :created_at)");
    $query->execute([
      "name" => $_POST["name"],
      "content" => $_POST["content"],
      "created_at" => date("Y-m-d H:i:s")
    ]);
    header("Location: ../blog/edit.php?id=" . $pdo->lastInsertId());
  }
  $query = $pdo->query("SELECT * from posts");
  /** @var Post[] */
  $posts = $query->fetchAll(PDO::FETCH_CLASS, "Post");
} catch(PDOException $e) {
  $error = $e->getMessage();
}

require "../elements/header.php";
?>

<div class="container">
  <?php if($error): ?>
    <div class="alert alert-danger">
      <?= $error ?>
    </div>
  <?php else: ?>
      <?php foreach($posts as $post): ?>
          <h2><a href="edit.php?id=<?= $post->id ?>"><?= htmlentities($post->name) ?></a></h2>
          <p class="small text-muted">
            Ecrit le <?= $post->created_at->format("d/m/Y H:i"); ?>           
          </p>
          <p>
            <?= nl2br(htmlentities($post->getExcerpt())) ?>
          </p>
      <?php endforeach ?>
    <form action="" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="name" value="">
      </div>
      <div class="form-group">
        <textarea type="text" class="form-control" name="content"></textarea>
      </div>
      <button class="btn btn-primary">Sauvegarder</button>
    </form>
  <?php endif ?>  
</div>






<?php
require "../elements/footer.php";
?>