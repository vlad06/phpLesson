<?php
$login=$_GET["login"];
$password=$_GET["password"];
$host="localhost";
$user="utilweb";
$password="utilweb";
$bdd="abi_as400";

$link = mysqli_connect($host, $user, $password, $bdd) or die ("erreur de connexion au serveur");
mysqli_set_charset($link,'utf8');

$query = "select * from utilisateurs where login='" . $login ."';" ;

$result = mysqli_query($link, $query) or die ("erreur sur requete table client ");

var_dump(mysqli_fetch_array($result));

if(mysqli_fetch_array($result)){
	echo "OK";
}
else {
	echo "Vous n'êtes pas inscrit !! ";
}
mysqli_free_result($result);
mysqli_close($link); ?>
