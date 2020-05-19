<?php //************** code PHP procédural classique ************** 
      // enregistrement effectif de la réservation 
      // page appelé par VCIResa3.php
      // insertion de la commande en table, affichage d'un accusé réception
      // et retour à page VCIResa.php	

$cejour = getdate(); 
$libcejour = $cejour['year'] . "-" . $cejour['mon'] . '-' . $cejour['mday'] ;
// echo $libcejour ."<br>" ; // pour test

// se connecter ࠬa BDD
$host = 'localhost';
$user = 'utilweb';
$password = 'utilweb';
$bdd =  'video';

$link = mysqli_connect($host, $user, $password) or die('Erreur de connexion au serveur MySQL');
mysqli_select_db($link, $bdd) or die ("Erreur de connexion a la base de donnees \"Vidéo\"");
mysqli_set_charset($link, 'utf8'); // jeu de car utilisé par la page Web
// recordset du client demandé
$sql = 'select * from adherent where NUM_ADHERENT=' . $_GET['numadherent'] . " and NOM_ADHERENT='" . $_GET['nom'] . "'" ; 
//echo $sql ; // pour test
$result = mysqli_query($link, $sql) or die ('Requête SQL select adhérent invalide');
$row = mysqli_fetch_assoc($result); 
// on pourrait aussi re-tester le code de film reçu..

?>
<?php require('VCIEntete.htm'); ?>

</head>
<body >
<!-- 1° ligne de titre -->
<header>
	<?php  require('VCITitre.php') ; ?>
</header>

<!-- 2° ligne : colonne menu et colonne contenu principal -->
<nav>
	<?php  require('VCIMenu.htm') ; ?>
</nav>

<!-- contenu principal de la page -->
<main>	
<h1 >Réservation de film</h1>
<?php  // le client demandé n'est pas trouvé
if (mysqli_num_rows($result)==0){
?>
<div class="centrer erreur">
	Attention : les coordonnées client saisies sont erronnées !
	<form>
		<input type="button" value="Retour" onClick="javascript:history.go(-1)">
	</form>
</div>
<?php  //il est ausssi necessaire de tester la non-existence d'une ligne similaire
   // dans la table location... ; 
}
else   // le client demandé existe
{
$sql3 = 'select * from location where NUM_ADHERENT = ' . $_GET['numadherent'] . " and ID_FILM = " . $_GET['codfil'] . " and DEBUT_LOCATION = '" . $libcejour . "'" ;
// echo $sql3 ; // pour tests
$result3 = mysqli_query($link, $sql3) or die ('Requête SQL select invalide');
if (mysqli_num_rows($result3)!=0){
$row = mysqli_fetch_assoc( $result3);
?>
<div class="centrer erreur">Attention : il y a déjà une réservation du film "<span class ="important"><?php  echo $_GET["libfil"]; ?></span>" pour l'adhérent <span class ="important"><?php  echo  $_GET["nom"]?></span>
	<form>
		<input type="button" value="Retour" onClick="javascript:history.go(-1)">
	</form>
</div>

<?php 
}
else
{ 	// ************* a finir **********************
// tout va bien : on enregistre dans la table location	(inachevé saisir le support...)
$sql2 = 'insert into location (NUM_ADHERENT, ID_FILM, CODE_SUPPORT, DEBUT_LOCATION) values(' . $_GET['numadherent'] . "," . $_GET['codfil'] . ",\"D\", \"" . $libcejour . "\")"	;
//echo $sql2; // pour test
$result2 = mysqli_query($link, $sql2) or die ('Requête SQL insert invalide');
?>
<div class="centrer">
	<h2>Merci <span class ="important"><?php  echo $_GET["nom"]; ?></span>  pour votre réservation.</h2>
	<p >
	Il ne vous reste plus qu'à passer en boutique pour retirer votre exemplaire du film<span class ="important">
	<?php  echo $_GET["libfil"]; ?></span>
	</p>
	<form>
		<input type="button" value="Retour au menu" onClick="javascript:window.location.href='VCIAccueil.php';">
	</form>
</div>
<?php 
} //fin cas normal
} // fin cas client existe mais réservation en cours
?>
</main>

</body>
</html>

<?php 	//facultatif, pour faire propre	 
mysqli_free_result($result);  
mysqli_close($link);
?>
