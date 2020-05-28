<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($title_for_layout)?$title_for_layout:"Mon site"; ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<!-- style="position:static" -->
<div class="navbar navbar-expand-sm bg-dark navbar-dark">
  <h3><a class="navbar-brand" href="#">Mon site</a></h3>
  <ul class="navbar-nav">
    <?php $pagesMenu = $this->request("Pages", "getMenu"); ?>
    <?php foreach($pagesMenu as $p): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL."/pages/view/".$p->id ?>" 
          title="<?php $p->name; ?>">
          <?php echo $p->name; ?>
        </a>
      </li>
    <?php endforeach; ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo BASE_URL."/posts"; ?>">
        Actualités
      </a>
    </li>
  </ul>
</div>


  <div class="container">
    <?php echo $content_for_layout; ?>
  </div> 
  
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>
