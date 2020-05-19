<?php //************** code PHP procédural classique ************** 
      // liste des films du type voulu
      // page appelée par VCIResa.php
	  
      // recherche des films du type demandé en vciresa.php
      // et affichage en tableau avec liens a href personnalisés vers VCIResa3.php

// se connecter à la BDD
$host = 'localhost';
$user = 'utilweb';
$password = 'utilweb';
$bdd =  'video';

$link = mysqli_connect($host, $user, $password) or die('Erreur de connexion au serveur MySQL');
mysqli_select_db($link, $bdd) or die ("Erreur de connexion a la base de donnees \"Vidéo\"");
mysqli_set_charset($link, 'utf8'); // jeu de car utilisé par la page Web
// recordset du type demandé
// (on aurait pu aussi bien effectuer une jointure des 3 tables
//  et afficher le libellé du type à partir du 1° enregistrement du RS2)
$sql = "select CODE_TYPE_FILM, LIB_TYPE_FILM from typefilm where CODE_TYPE_FILM='" . $_GET['typef'] . "'" ; 
//echo $sql;	// pour test
$result = mysqli_query($link, $sql) or die ('Requête SQL select typfilm invalide'); 
$row = mysqli_fetch_array($result);

// recordset des films du type demandé (avec réalisateur)
// - projection
$sql2 = 'select ID_FILM, TITRE_FILM, ANNEE_FILM, ID_REALIS, REF_IMAGE, RESUME, NOM_STAR, PRENOM_STAR '	 ;
// - produit cartésien
$sql2 .= ' from film, star '	;
// - restriction concordance
$sql2 .=  ' where film.ID_REALIS=star.ID_STAR '	 ;
// - restriction utilisateur
$sql2 .= " and CODE_TYPE_FILM='" . $_GET['typef'] . "'"  ;
// - tri
$sql2 .=  ' order by TITRE_FILM; ' 	 ;
//echo $sql2 ; // pour mise au point
$result2 = mysqli_query($link, $sql2) or die ('Requête SQL select film,star invalide');
 
?>
 
<?php require('VCIEntete.htm'); ?>

</head>
<body>
<!-- 1° ligne de titre -->
<header>
	<?php  require('VCITitre.php') ; ?>
</header>

<!-- colonne menu -->
<nav>
	<?php  require('VCIMenu.htm'); ?>
</nav>

<!-- contenu principal de la page -->
<main>	
<h1 >
Liste des films du type <?php  echo $row['LIB_TYPE_FILM'] ;?></h1>
<?php  // si aucun film pour le type demandé : pas de tableau
if (mysqli_num_rows($result2)==0){
?>
<div class="centrer">
<span class="erreur">Désolé, aucun film disponible pour le type <?php  echo $row['LIB_TYPE_FILM'] ;?></span>
</p>

<?php  //il y a des films pour le type demandé
} else {
?>
<h2>Sélectionnez le film que vous désirez réserver :</h2>
<div class="centrer cent">
<table class="listefilms">
    <tr>
      <th >Titre du film</th>
      <th >Son année</th>
      <th  colspan="2">Réalisateur</th>
	  <th >Affiche</th>
    </tr>
    
  <?php  // alimentation de lignes du tableau HTML pour chaque enregistrement du RS2
     while($row2 = mysqli_fetch_assoc($result2)){
  ?>
	<tr>
	  <td> <a href="VCIResa3.php?filmchoisi=<?php echo $row2['ID_FILM'] ;?>&libfilmchoisi=<?php  echo urlencode($row2['TITRE_FILM']) ;?>&anfilmchoisi=<?php  echo $row2['ANNEE_FILM'] ; ?>&reafilmchoisi=<?php  echo urlencode($row2['PRENOM_STAR'] . ' ' . $row2['NOM_STAR']) ;?>&affiche=<?php  echo urlencode($row2['REF_IMAGE']) ; ?>"> 
	  <?php  echo $row2['TITRE_FILM'] ; ?> </a></td>
      <td> <?php  echo $row2['ANNEE_FILM'] ; ?></td>
	  <td> <?php  echo $row2['NOM_STAR'] ; ?></td>
	  <td> <?php  echo $row2['PRENOM_STAR'] ; ?></td>
	  <td><a href="VCIResa3.php?filmchoisi=<?php echo $row2['ID_FILM'] ;?>&libfilmchoisi=<?php  echo urlencode($row2['TITRE_FILM']) ;?>&anfilmchoisi=<?php  echo $row2['ANNEE_FILM'] ; ?>&reafilmchoisi=<?php  echo urlencode($row2['PRENOM_STAR'] . ' ' . $row2['NOM_STAR']) ;?>&affiche=<?php  echo urlencode($row2['REF_IMAGE']) ; ?>"> 
	  <img border="0" src="images/affiches/<?php  echo $row2['REF_IMAGE'] ;?>" title="<?php  echo $row2['RESUME']; ?>"></a></td>
	</tr> 
  <?php  
  	}  // fin du while
  ?>
    
</table>
</div>
<?php 
} // fin du if
?>
<div class="centrer cent">
<table  border="0" width="80%">
	<tr>
		<td width="50%" align="right">
			<form action="VCIResa.php">
				<input type="submit" value="Autre type de film">
			</form>
		</td>
		<td width="50%" align="left">
			<form action="VCIAccueil.php">
				<input type="submit" value="Retour accueil">
			</form>
		</td>
	</tr>
</table>
</div>
</main>

</body>
</html>

<?php 	//facultatif, pour faire propre…	 
mysqli_free_result($result);  
mysqli_close($link);
?>
