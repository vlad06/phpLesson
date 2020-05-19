<?php //************** code PHP procédural classique **************
      // insertion en BDD d'un nouveau film

// se connecter à la BDD
$user = 'utilweb';
$password = 'utilweb';
$host = 'localhost';
$bdd =  'video';
$link = mysqli_connect($host, $user, $password, $bdd) or die('Erreur de connexion au serveur MySQL');
mysqli_set_charset($link, 'utf8');

// ajouter le contrôle d'inexistence 

// requete insert SQL
$requete = 'insert into film(ID_FILM, TITRE_FILM, ID_REALIS, CODE_TYPE_FILM, ANNEE_FILM, REF_IMAGE, RESUME) values (';
$requete .= $_POST['ID_FILM'] . ', ';
$requete .= '\'' . strtoupper(trim($_POST['TITRE_FILM'])) . '\', '; // avec conversion titre en MAJ
$requete .= $_POST['ID_REALIS'] . ', ';
$requete .= '\'' . $_POST['CODE_TYPE_FILM'] . '\', ';
$requete .= $_POST['ANNEE_FILM'] . ', ';
$requete .= '\'' . $_POST['REF_IMAGE'] . '\', ';
$requete .= '\'' . ucfirst(trim($_POST['RESUME'])) . '\' );'; // capitale forcée au début du résumé
// echo $requete; // pour test
mysqli_query($link, $requete) or die ('Requête SQL invalide');

// redirige vers la liste des films avec message OK
header('Location: VCIAdmin.php?error=film ' . strtoupper(trim($_POST['TITRE_FILM'])) . ' inséré avec succès' );

//facultatif, pour faire propre…	 
mysqli_free_result($result);  
mysqli_close($link);

exit();
?>