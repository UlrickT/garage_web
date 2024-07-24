<?php
$server="localhost";
$base="site_garage_web";
$userdb="root";
$userpwd="";
$connexion=new mysqli($server,$userdb,$userpwd,$base);

if($connexion->connect_error){
	die("Erreur de connexion : ".$connexion->connect_error);
}
?>
