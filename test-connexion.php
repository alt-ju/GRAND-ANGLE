<?php
 
session_start();
if (isset($_SESSION['USER'])) {
    header("Location: dashboard.php");
}
 
if (!empty($_POST)) {
    if (
        isset($_POST["mail"], $_POST["pass"])
        && !empty($_POST["mail"])
        && !empty($_POST["pass"])
    ) {
        if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            // error
        }
 
        require_once "config/pdo.php";
        $sql = "SELECT * FROM collaborateur WHERE mail=:mail";
        $query = $db->prepare($sql);
        $query->bindValue(":mail", $_POST["mail"], PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
 
        if (!$user) {
            die("Utilisateur et/ou mot de passe incorrect");
        }
 
 
        /* $rolesArray = json_decode($user["roles"], true);
 
        $_SESSION["user"] = [
            "id" => $user["id_collaborateur"],
            "username" => $user["nom"],
            "email" => $_POST["email"],
            "roles" => $rolesArray
        ];
*/
        header("Location: dashboard.php");
    } else {
        die("Oups!! Wrong Way Bob !");
    }
}
 
;?>






<?php

session_start();

$error = '';

if(isset($_SESSION["user"])) {
  header("Location: home-dash.php");
  exit;
}


if(!empty($_POST)) {
  
  if(isset($_POST["email"], $_POST["pass"])
  && !empty($_POST["email"])
  && !empty($_POST["pass"])
  ){
      if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error = "Email ou mot de passe incorrect";
      }

      require_once "config/pdo.php";
      $sql = "SELECT * FROM collaborateur WHERE Email_Collaborateur = :email";
        $query = $db->prepare($sql);
        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();

      if(!$user) {
        $error = "Email ou mot de passe invalide";
      }

      if(!password_verify($_POST["pass"], $user["Pass_Collaborateur"])) {
        $error = "Email ou mot de passe invalide";
      }

      $rolesArray = json_decode($user["roles"], true);


        if(in_array("ADMIN", $rolesArray)) {
          $_SESSION["admin"] = [
            "id" => $user["id_Collaborateur"],
            "nom" => $user["Nom_Collaborateur"],
            "prenom" => $user["prenom_Collaborateur"],
            "email" => $user["Email_Collaborateur"],
            "roles" => $rolesArray
          ]; 
    
         header("Location: home-dash.php");
          exit;
        } else {
          header("Location: index.php");
          exit;
        }

  } else {
    die("NOPE");
  }
} 

include "includes/pages/header.php";

;?>
