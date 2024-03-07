<?php
try{
    $connexion = new mysqli("localhost","root","","cinema");
}catch(PDOException $e){
    echo $e;
}
?>