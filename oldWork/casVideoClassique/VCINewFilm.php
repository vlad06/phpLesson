<?php //************** code PHP procédural classique **************
      // page saisie d'un nouveau film 
	  
// se connecter à la BDD  
$host = 'localhost';
$user = 'utilweb';
$password = 'utilweb';
$bdd =  'video';
$link=mysqli_connect($host, $user, $password,$bdd) or die('Erreur de connexion au serveur MySQL');
mysqli_set_charset($link, 'utf8');
// liste des types de films pour boite select
$sqlType = 'select CODE_TYPE_FILM, LIB_TYPE_FILM from typefilm order by LIB_TYPE_FILM;'	;
// echo $sqlType ; // pour test
$resultType = mysqli_query($link, $sqlType) or die ('Requête SQL Types de films invalide'); 

// liste des stars pour boite select
$sqlStar = 'SELECT ID_STAR, NOM_STAR,PRENOM_STAR FROM star order by NOM_STAR,PRENOM_STAR;' ;
// echo $sqlStar ; // pour test
$resultStar = mysqli_query($link, $sqlStar) or die ('Requête SQL Stars invalide'); 

?>
<?php require('VCIEntete.htm'); ?>
</head>
<body class="admin">
<!-- 1° ligne de titre :VCITitreAdmin.php -->
	<header>
<?php require('VCITitreAdmin.php');  ?>
</header>

<!-- colonne menu VCIMenuAdmin.htm -->
<nav>
	<?php require('VCIMenuAdmin.htm'); ?>
</nav>
			
<!-- contenu principal de la page -->	
<h1 >Saisie d'un nouveau film</h1>

<form name="frmNewFilm" action="VCINewFilm2.php" method="post">
<table>
	<tr>
		<td>Identifiant :</td><td><input type = "text" name="ID_FILM" /></td>
	</tr> 
	<tr>
		<td>Titre :</td><td><input type = "text" name="TITRE_FILM" /></td>
	</tr> 
	<tr>
		<td>Type de film :</td>
		<td>
			<select name="CODE_TYPE_FILM">
				<?php
				while($row = mysqli_fetch_array($resultType)){
				 ?>
				<option value = "<?php  echo $row['CODE_TYPE_FILM'] ?>"><?php  echo $row['LIB_TYPE_FILM']?></option>
				<?php  
				}
				?>
			</select>
		</td>
	</tr> 
	<tr>
		<td>Réalisateur :</td>
		<td>
			<select name="ID_REALIS" />
				<?php
				while($row = mysqli_fetch_array($resultStar)){
				?>
				<option value = "<?php  echo $row['ID_STAR'] ?>"><?php  echo trim($row['NOM_STAR']) . " " . trim($row['PRENOM_STAR']);?></option>
				<?php  
				}
				?>
			</select>
		</td>
	</tr> 
	<tr>
		<td>Année de sortie :</td><td><input type = "text" name="ANNEE_FILM" /></td>
	</tr> 
	<tr>
		<td>Affiche :</td><td><input type = "text" name="REF_IMAGE" /></td>
	</tr> 
	<tr>
		<td>Résumé :</td><td><textarea name="RESUME"></textarea></td>
	</tr> 
	<tr>
		<td><input type="submit" value="Créer" /></td><td><input type="reset" value="Recommencer"/ ></td>
	</tr>
</table>
</form>
<!-- fin de contenu principal de la page -->
		
</body>
</html>

<?php 	//facultatif, pour faire propre…	 
mysqli_free_result($resultType);  
mysqli_free_result($resultStar);  
mysqli_close($link);
?>