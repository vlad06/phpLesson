<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($title_for_layout)?$title_for_layout:"Mon site"; ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap-combined.min.css">
  
  <!-- "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" -->
</head>
<body>

  <div class="topbar">
    <div class="topbar-inner">
      <div class="container">
        <h3><a href="#">Mon site</a></h3>
        <ul class="nav">
        <?php foreach($pages as $p): ?>
          <li>
            <a href="<?php echo BASE_URL."/pages/view/".$p->id ?>" 
              title="<?php $p->name; ?>"><?php echo $p->name; ?>
            </a>
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>

  <div class="container">
    <?php echo $content_for_layout; ?>
  </div> 
  
</body>
</html>
