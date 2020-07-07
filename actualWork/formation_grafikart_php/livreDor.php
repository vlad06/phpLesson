<?php

$title = "Livre d'or";  // title of the page is in the header and must be declared before
require_once "elements/header.php";
require_once "class/Message.php";
require_once "class/GuestBook.php";

$errors = null;
$success = false;
$guestBook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "messages");

if(isset($_POST["username"], $_POST["message"])) {
  $message = new Message($_POST["username"], $_POST["message"]);
  if($message->isValid()) {
    $guestBook->addMessage($message);
    $success = true;
    $_POST = [];
  } else {
    $errors = $message->getErrors();
  }
}
$messages = $guestBook->getMessages();

?>

<?php if(!empty($errors)): ?>
  <div class="alert alert-danger">
    Formulaire invalide
  </div>
<?php endif; ?>

<?php if($success): ?>
  <div class="alert alert-success">
    Merci pour votre message
  </div>
<?php endif; ?>

<h2>Livre d'or</h2>
<form action="" method="POST">
  <div class="form-group">
    <input type="text" name="username" value="<?= htmlentities($_POST['username'] ?? '')?>"class="form-control <?= isset($errors["username"]) ? "is-invalid" : "" ?>" placeholder="Votre pseudo" > 
    <?php if(isset($errors["username"])): ?>
      <div class="invalid-feedback">
        <?= $errors["username"]; ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <textarea type="text" name="message" class="form-control <?= isset($errors["message"]) ? "is-invalid" : "" ?>" placeholder="Votre message"><?= htmlentities($_POST['message'] ?? '') ?></textarea>
    <?php if(isset($errors["message"])): ?>
      <div class="invalid-feedback">
        <?= $errors["message"]; ?>
      </div>
    <?php endif; ?>
  </div>
  <button type="submit" class="btn btn-primary">Envoyer le message</button>
</form>

<?php if(!empty($messages)): ?>
  <h1 class="mt-4">Vos messages</h1>
<?php foreach($messages as $message): ?>
  <?= $message->toHTML() ?>
<?php endforeach ?>

<?php endif ?>

