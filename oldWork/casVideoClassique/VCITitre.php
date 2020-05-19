<?php //************** code PHP procédural classique **************
      // bandeau titre site  Video-club

$cejour = getdate(); 
//$libmois[] = array ('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'décembre' ); 
$libmois[1] = 'janvier'; 
$libmois[2] = 'février'; 
$libmois[3] = 'mars'; 
$libmois[4] = 'avril'; 
$libmois[5] = 'mai'; 
$libmois[6] = 'juin'; 
$libmois[7] = 'juillet'; 
$libmois[8] = 'aout'; 
$libmois[9] = 'septembre'; 
$libmois[10] = 'octobre'; 
$libmois[11] = 'novembre'; 
$libmois[12] = 'décembre'; 

?>

<script language="JavaScript">
function goAdmin(){
	// afficher la div de form saisie login et pass	
	// et enchainer par le form sur VCILogAdmin.php
	// qui redirige vers VCIAdmin.php ou sur VCIAccueil.php	
	document.getElementById("divLogin").style.visibility="visible";
}

function goBackSite(){
	// masquer la div de form saisie login et pass	
	document.getElementById("divLogin").style.visibility="hidden";
}		
</script>
<table >
    <tr>
      <td><a href="VCIAccueil.php"><img src="images/VCLogo.gif" border="0"/></a></td>
      <td class="centrer">
			<div class="titrevideo">Vidéo-Club</div>
			<div class="soustitrevideo">... et si on se faisait une toile, à la maison ?</div>
	  </td>
      <td><?php  echo $cejour['mday'] . ' ' . $libmois[$cejour['mon']] . ' ' . $cejour['year'];?> <br /><a href="javascript:goAdmin();">Admin</a></font></td>
    </tr>
</table>
<div id="divLogin" class="divCache" >
	<form name="frmlogin" action="VCILogAdmin.php" method="post">
		<p>Login : <input type ="text" name="login" /></p>
		<p>Pass&nbsp; : <input type ="password" name="pass" /></p>
		<p><input type="button" onclick="goBackSite();" value="Retour" />
			<input type="submit" value="Go !" /></p>
	</form>
</div>

