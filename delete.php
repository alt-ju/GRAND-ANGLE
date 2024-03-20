<?php 

require "config/pdo.php";

if(isset($_POST['Id_oeuvre'])) {

    var_dump($_POST);
    $oeuvreId = $_POST['Id_oeuvre'];

    $sql2 = "DELETE FROM image WHERE Id_oeuvre = $oeuvreId";
    try {
        $requete2 = $db->prepare($sql2);
        $requete2->execute(); 
    } catch(PDOException $e) {
        echo ('erreur 2') . $e->getMessage();
    }

    $sql = "DELETE FROM oeuvres WHERE Id_oeuvre = $oeuvreId";
    try {
        $requete = $db->prepare($sql);
        $requete->execute();  
    } catch(PDOException $e) {
        echo ('erreur 1') . $e->getMessage();
    }
    
}

;?>