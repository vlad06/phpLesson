<?php //************** code PHP procédural classique ************** 
      // saisie coordonnées adhérent pour réservation
	  // page appelée par VCIResa2.php
?>

<?php require('VCIEntete.htm'); ?>
<script language="javascript">
// fonction de contrôle des zones de saisie
// pour soumission du formulaire si tout est OK
function vazy()
{
	var erreur = false;
	// TODO : ajouter un contrôle de saisie du n° adhérent - numérique -  et du nom
	if (! (erreur))
		{
			document.getElementById("coordonnee").submit()
		}
}

</script>

</head>
<body onload="document.getElementById('nom').focus();">
<!-- 1° ligne de titre -->
<header>
	<?php  require('VCITitre.php') ; ?>
</header>

<nav>
	<?php  require('VCIMenu.htm') ; ?>
</nav>

<!-- contenu principal de la page -->
<main>	

<form id="coordonnee" action="VCIResa4.php" method = "get">
	<input type = "hidden" name="codfil" value="<?php  echo $_GET['filmchoisi'] ; ?>">
	<input type="hidden" name ="libfil" value="<?php  echo $_GET['libfilmchoisi'] ;?>">
	<h1 >Voici le film que vous avez sélectionné</h1>
	<div class="centrer cent">
	<table class="recap"> 
		<tr>
			<td rowspan="3"><img src="images/affiches/<?php  echo $_GET['affiche'] ;?>" /></td>
			<td>titre :</td>
			<th><?php  echo $_GET['libfilmchoisi']; ?></th>
			</tr>
		<tr>
			<td>année :</td>
			<th><?php  echo $_GET['anfilmchoisi']; ?></th>
		</tr>
		<tr>
			<td>réalisateur :</td>
			<th><?php  echo $_GET['reafilmchoisi']; ?></th>
		</tr>
	</table>
	
	<h2 >Veuillez saisir vos coordonnées:</h2>
	<table class="recap">
		<tr>
			<td><span title="aide : Adh1 ou Adh2">Nom :</span></td>
			<td><input type="text" name="nom" id="nom" size="25" maxlength="25" /></td>
		</tr>
		<tr>
			<td><span title="aide : 1 ou 2">N° adhérent :</span></td>
			<td><input type="text" name="numadherent" id="numadherent" size="25" maxlength="25" /></td>
		</tr>
		<tr>
			<td ></td> 
			<td ><input type="button" value=" Réserver " onclick="javascript:vazy();"> <input type ="button" value = " Annuler " onclick="javascript:window.location.href = 'vciresa.php';"></td>
		</tr>
	</table>
	</div>
</form>
</main>
<!-- fin de contenu principal de la page -->

</body>
</html>
