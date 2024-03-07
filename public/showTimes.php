<?php
include_once("menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Showtimes - Admin Dashboard</title>
</head>
<body>
    <div class="content">
        <header>
            <h2>Showtime Management</h2>
        </header>
        <main class="container">
            <div class="room_container">
                <!-- Showtime for Each Day -->
                <?php
                    include("connexion.php");
                    $result = $connexion -> query("SELECT * FROM `salle` where disponibilite = 'disponible'");
                    for($i=0;$i<$result->num_rows;$i++){
                        $row = $result->fetch_assoc();
                        echo "<div class='rooms' onclick='openShowTimes(".$row['id_salle'].")'>
                                <h3>".$row['libelle']."</h3>
                                <ul class='showtimes'>
                                    <li><i class='fas fa-door-open'></i></li>
                                </ul>
                            </div>";
                        echo "<div id='".$row['id_salle']."' class='modal'>
                                <div class='modal-content2'>
                                    <span class='close' onclick='closeShowTimes(".$row['id_salle'].")'>&times;</span>
                                    <table class='table2'>
                                        <thead>
                                            <tr>
                                                <th>Time/n°<span id='salleSpan'>".$row['id_salle']."</span></th>
                                                <th class='jour'></th>
                                                <th class='jour'></th>
                                                <th class='jour'></th>
                                                <th class='jour'></th>
                                                <th class='jour'></th>
                                                <th class='jour'></th>
                                                <th class='jour'></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>10h00</th>";?>
                                                <?php 
                                                for($j=0;$j<7;$j++){
                                                    $film = $connexion -> query("SELECT titre FROM `seance` INNER JOIN film on seance.id_film=film.id_film where id_salle=".$row['id_salle']." and horaire='10:00:00' AND date_seance=CURRENT_DATE+".$j."") -> fetch_assoc();
                                                    $dateP=date("Y-m-d",strtotime(date("Y-m-d").' +'.$j.' day'));
                                                    $nDateP=str_replace("-","",$dateP);
                                                    $heureP=10;
                                                    $salleP=$row['id_salle'];
                                                    if($film!=null){
                                                        if(strlen($film['titre'])<=14){
                                                            echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")' title='".$film['titre']."'>".$film['titre']."</td>";
                                                        }else{
                                                            echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")' title='".$film['titre']."'>".substr($film['titre'],0,12)."..</td>";
                                                        }
                                                    }else{
                                                        echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")'>---</td>";
                                                    }
                                                }
                                                echo "</tr>
                                            <tr>
                                                <th>13h00</th>";?>
                                                <?php 
                                                for($j=0;$j<7;$j++){
                                                    $film = $connexion -> query("SELECT titre FROM `seance` INNER JOIN film on seance.id_film=film.id_film where id_salle=".$row['id_salle']." and horaire='13:00:00' AND date_seance=CURRENT_DATE+".$j."") -> fetch_assoc();
                                                    $dateP=date("Y-m-d",strtotime(date("Y-m-d").' +'.$j.' day'));
                                                    $nDateP=str_replace("-","",$dateP);
                                                    $heureP=13;
                                                    $salleP=$row['id_salle'];
                                                    if($film!=null){
                                                        if(strlen($film['titre'])<=14){
                                                            echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")' title='".$film['titre']."'>".$film['titre']."</td>";
                                                        }else{
                                                            echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")' title='".$film['titre']."'>".substr($film['titre'],0,12)."..</td>";
                                                        }
                                                    }else{
                                                        echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")'>---</td>";
                                                    }
                                                }
                                                echo "</tr>
                                            <tr>
                                                <th>16h00</th>";?>
                                                <?php 
                                                for($j=0;$j<7;$j++){
                                                    $film = $connexion -> query("SELECT titre FROM `seance` INNER JOIN film on seance.id_film=film.id_film where id_salle=".$row['id_salle']." and horaire='16:00:00' AND date_seance=CURRENT_DATE+".$j."") -> fetch_assoc();
                                                    $dateP=date("Y-m-d",strtotime(date("Y-m-d").' +'.$j.' day'));
                                                    $nDateP=str_replace("-","",$dateP);
                                                    $heureP=16;
                                                    $salleP=$row['id_salle'];
                                                    if($film!=null){
                                                        if(strlen($film['titre'])<=14){
                                                            echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")' title='".$film['titre']."'>".$film['titre']."</td>";
                                                        }else{
                                                            echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")' title='".$film['titre']."'>".substr($film['titre'],0,12)."..</td>";
                                                        }
                                                    }else{
                                                        echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")'>---</td>";
                                                    }
                                                }
                                                echo "</tr>
                                            <tr>
                                                <th>19h00</th>";?>
                                                <?php 
                                                for($j=0;$j<7;$j++){
                                                    $film = $connexion -> query("SELECT titre FROM `seance` INNER JOIN film on seance.id_film=film.id_film where id_salle=".$row['id_salle']." and horaire='19:00:00' AND date_seance=CURRENT_DATE+".$j."") -> fetch_assoc();
                                                    $dateP=date("Y-m-d",strtotime(date("Y-m-d").' +'.$j.' day'));
                                                    $nDateP=str_replace("-","",$dateP);
                                                    $heureP=19;
                                                    $salleP=$row['id_salle'];
                                                    if($film!=null){
                                                        if(strlen($film['titre'])<=14){
                                                            echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")' title='".$film['titre']."'>".$film['titre']."</td>";
                                                        }else{
                                                            echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")' title='".$film['titre']."'>".substr($film['titre'],0,12)."..</td>";
                                                        }
                                                    }else{
                                                        echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")'>---</td>";
                                                    }
                                                }
                                                echo "</tr>
                                            <tr>
                                                <th>22h00</th>";?>
                                                <?php 
                                                for($j=0;$j<7;$j++){
                                                    $film = $connexion -> query("SELECT titre FROM `seance` INNER JOIN film on seance.id_film=film.id_film where id_salle=".$row['id_salle']." and horaire='22:00:00' AND date_seance=CURRENT_DATE+".$j."") -> fetch_assoc();
                                                    $dateP=date("Y-m-d",strtotime(date("Y-m-d").' +'.$j.' day'));
                                                    $nDateP=str_replace("-","",$dateP);
                                                    $heureP=22;
                                                    $salleP=$row['id_salle'];
                                                    if($film!=null){
                                                        if(strlen($film['titre'])<=14){
                                                            echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")' title='".$film['titre']."'>".$film['titre']."</td>";
                                                        }else{
                                                            echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")' title='".$film['titre']."'>".substr($film['titre'],0,12)."..</td>";
                                                        }
                                                    }else{
                                                        echo "<td onclick='openAddPlan(".$nDateP.",".$heureP.",".$salleP.")'>---</td>";
                                                    }
                                                }
                                                echo "</tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>";
                    } 
                ?>
                <!-- Add more days as needed -->
            </div>
            <div id="addPlan" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeAddPlan()">&times;</span>
                        <h3>Ajouter une seance</h3>
                        <form action="ajouterSeance.php" method="post">
                            <label for="dateP">Date:</label>
                            <input readonly type="text" id="dateP" name="dateP">
                            <label for="heureP">Heure:</label>
                            <input readonly type="text" id="heureP" name="heureP">
                            <label for="salleP">Salle de projection:</label>
                            <input readonly type="text" id="salleP" name="salleP">
                            <label for="filmP">Film:</label>
                            <select name="filmP" id="filmP" required>
                            <?php
                                $result = $connexion -> query("SELECT titre FROM `film`");
                                for($i=0;$i<$result->num_rows;$i++){
                                    $row = $result->fetch_assoc();
                                    echo "<option value='".$row['titre']."'>".$row['titre']."</option>";
                                } 
                            ?>
                            </select><br>
                            <input type="submit" onclick="savePlan()" value="Sauvegarder">
                            <input type="reset" class="redbutton" onclick="closeAddPlan()" value="Annuler">
                        </form>
                    </div>
                </div>
        </main>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
