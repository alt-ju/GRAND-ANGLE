<?php 

$id = $_GET['id'];

$title = "Modifier un artiste";

session_start();

include "includes/pages/header.php";
include "includes/pages/nav-head.php";
include "includes/pages/navbarr.php";


;?>

<div class="gestion gestion-add-oeuvre">
    <div class="oeuvre-unique-contain">
        <div class="oeuvre-unique-infos col">
            <?php include "includes/components/compo-update-artiste.php";?>   
        </div>

        <div class="oeuvre-unique-contenu col">
            <?php include "includes/components/compo-bio-update-artiste.php";?>   
        </div>
    </div>
</div>