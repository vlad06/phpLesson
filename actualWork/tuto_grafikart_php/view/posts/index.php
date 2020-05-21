<div class="page-header">
    <h1>Le Blog</h1>
</div>

<?php foreach ($posts as $k => $v): ?>
  <h2><?php echo $v->name; ?></h2>
  <?php echo $v->content; ?>
  <p>
    <a href="<?php echo Router::url("posts/view/id:{$v->id}/slug:{$v->slug}"); ?>">
      Lire la suite &rarr;
    </a>
  </p>
<?php endforeach ?>

<div>
  <ul class="pagination">
    <?php for($i = 1; $i <= $page; $i++): ?>
      <li <?php if($i == $this->request->page) echo "class=\"page-item active\""; ?>>
        <a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i; ?></a>
      </li>
    <?php endfor; ?>
  </ul>
</div>