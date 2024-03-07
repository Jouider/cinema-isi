<?php
include_once("menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Rooms - Admin Dashboard</title>
</head>
<body>
    <div class="content">
        <header>
            <h2>Room Management</h2>
        </header>
        <main>
            <div class="container">
                <table class="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Capacity</th>
                            <th>Availability</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("connexion.php");
                            $result = $connexion -> query("SELECT libelle,capacite,disponibilite FROM `salle`");
                            for($i=0;$i<$result->num_rows;$i++){
                                $row = $result->fetch_assoc();
                                echo "<tr>
                                        <td>".$row['libelle']."</td>
                                        <td>".$row['capacite']."</td>
                                        <td>".$row['disponibilite']."</td>
                                    </tr>";
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
