<?php
include("connexion.php");
$id_film=$connexion -> query("SELECT id_film FROM `film` WHERE titre='".$_POST['filmP']."'") -> fetch_assoc();
$connexion -> query("INSERT INTO `seance`(`date_seance`, `horaire`, `id_salle`, `id_film`) VALUES ('".$_POST['dateP']."','".$_POST['heureP']."',".$_POST['salleP'].",".$id_film['id_film'].")");
header("location:showTimes.php");
?>