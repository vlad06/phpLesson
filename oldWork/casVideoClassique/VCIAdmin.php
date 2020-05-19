<?php //************** code PHP procédural classique **************
      // page accueil administration site Video-club

// récup label erreur éventuel
if(isset($_GET["error"]))
	$erreur = $_GET["error"] ;
else
	$erreur ="";
?>
<?php require('VCIEntete.htm'); ?>

</head>
<body class="admin">
<!-- 1° ligne de titre : VCITitreAdmin.php-->
<header>
<?php require('VCITitreAdmin.php'); ?>
</header>

<!-- 2° ligne : colonne menu : VCIMenuAdmin.htm -->
<nav>
<?php require('VCIMenuAdmin.htm'); ?>
</nav>	

<!-- contenu principal de la page -->
<main>	
<h1 >Administration du Vidéo-Club</h1>
<?php // label erreur éventuel (après création nouveau film)
if($erreur != "") echo "<div class='important centrer erreur' > ".  $erreur . '</div>';
?>
</main>
<!-- fin de contenu principal de la page -->

</body>
</html>


