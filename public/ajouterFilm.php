<?php
include("connexion.php");
$connexion -> query("INSERT INTO `film`(`titre`, `duree`, `date_sortie`, `description`, `min_age`, `image`) VALUES ('".$_POST['titre']."','".$_POST['duree']."','".$_POST['dateSortie']."','".$_POST['description']."','".$_POST['ageRestriction']."','".$_POST['image']."')");
$id_film=$connexion -> query("SELECT id_film FROM `film` WHERE titre='".$_POST['titre']."'") -> fetch_assoc();
for($i=0;$i<count($_POST['genre']);$i++){
    $connexion -> query("INSERT INTO `genre_film`(`id_genre`, `id_film`) VALUES ((SELECT id_genre FROM `genre` WHERE libelle='".$_POST['genre'][$i]."'),".$id_film['id_film'].")");
}
header("location:movies.php");
?>