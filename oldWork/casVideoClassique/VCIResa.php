<?php //************** code PHP procédural classique ************** 
      // page de liste des types de films pour réservation 
	  
// se connecter à la BDD
$host = 'localhost';
$user = 'utilweb';
$password = 'utilweb';
$bdd =  'video';

$link = mysqli_connect($host, $user, $password) ;
mysqli_select_db($link, $bdd) or die ("Erreur de connexion a la base de donnees \"Vidéo\"");
mysqli_set_charset($link, 'utf8'); // jeu de car utilisé par la page Web
// recordset des types de films pour affichage en liste Select 
$sql = 'select CODE_TYPE_FILM, LIB_TYPE_FILM from typefilm order by LIB_TYPE_FILM;'	;
// echo $sql ; // pour test
$result = mysqli_query($link, $sql) or die ("Requête SQL invalide");   
?> 

<?php require('VCIEntete.htm'); ?>

<script type="text/javascript">
// fonction de contrôle du type saisi
// fonction déclenchée par onChange sur liste Select
// et déclenchant le submit du formulaire
function vazy()
{
	if (!(document.getElementById("typef").value==""))
		{
			document.getElementById("f_type").submit()
		}
}
</script>
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
Sélectionnez le type de film que vous recherchez :
</h1>
<form  action="VCIResa2.php" id="f_type" method = "get">
	<table class="cent">
		<tr>
			<td class="centrer">
				<select  name="typef" id="typef" onchange="vazy()" >
				<!-- première option par défaut -->
					<option selected value="">&lt;Sélectionnez le type recherché&gt;</option>
					<?php  // liste des types issus du recordset 
					while($row = mysqli_fetch_array($result)){
					 ?>
					<option value = "<?php  echo $row['CODE_TYPE_FILM'] ?>"><?php  echo $row['LIB_TYPE_FILM']?></option>
					<?php  
					}
					?>
				</select>
			</td>
		</tr>
	</table>
</form>
</main>
<!-- fin de contenu principal de la page -->

</body>
</html>	

<?php 	//facultatif, pour faire propre…	 
mysqli_free_result($result);  
mysqli_close($link);
?>
