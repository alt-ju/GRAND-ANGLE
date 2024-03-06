<?php

$title = "Connexion";

include "includes/pages/header.php";
include "functions/filter.php";

session_start();

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
      die("Adresse email ou mot de passe incorrect");
    }

    require_once "config/pdo.php";
    $sql = "SELECT * FROM collaborateur WHERE Email_Collaborateur = :email";
    $query = $db->prepare($sql);
    $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();

    $passUser = $user["Pass_Collaborateur"];
    $passField = $_POST["pass"];

    if(!$user) {
      die("Adresse");
    }

    if($passUser !== $passField) {
      die("mot de passe");
    }

    $rolesArray = json_decode($user["roles"], true);

    $_SESSION["user"] = [
      "id" => $user["id_Collaborateur"],
      "nom" => $user["Nom_Collaborateur"],
      "prenom" => $user["Prenom_Collaborateur"],
      "email" => $user["Email_Collaborateur"],
      "roles" => $rolesArray
    ];

    header("Location: home-dash.php");

  } else {
    die("NOPE");
  }
}

;?>

<div class="content-bienvenue">

    <h1 class="bienvenu">Bienvenue dans votre logiciel de gestion</h1>
    
      <form class="form-login" method="POST" action="">
              <div class="from-divs">
                <label for="email" >Email :</label>
              </div>

              <div class="from-divs">
                <input type="email"  id="email" class="field-login"  name="email" placeholder="email@example.com">
                <div class="red"></div>
              </div>
              <div class="from-divs">
                  <label for="pass" >Mot de Passe :</label>
              </div>
              <div class="from-divs">
                  <input type="password"  class="field-login" id="pass"  name="pass">
              </div>
              <div class="from-divs login-input" >
                <input type="submit" class="input-sub-login" value="Confirm identity">
              </div>
              <div class="red"></div>
      </form>
</div>