<?php 


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
<table width="100%" border="0">
    <tr>
      <td ><a href="VCIAccueil.php"><img src="images/VCLogo.gif" border="0"></a></td>
      <td class="centrer">
			<div class="titrevideo">Vidéo-Club</div>
			<div class="soustitrevideo">Administration</div>
	  </td>
      <td><?php echo $cejour['mday'] . ' ' . $libmois[$cejour['mon']] . ' ' . $cejour['year'];?> <br /><a href="VCIAccueil.php">Site</a></td>
    </tr>
</table>

