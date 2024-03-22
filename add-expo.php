<?php

session_start();

$title = "Ajouter une exposition";
require_once './config/pdo.php';


include "includes/pages/header.php";
include "includes/pages/nav-head.php";
include "includes/pages/navbarr.php";


;?>

<div class="gestion">
 <?php include "includes/components/compo-add-expo.php" ;?>
</div>

