<?php

session_start();

$title = "Ajouter une oeuvre";

include 'includes/pages/header.php';
include 'includes/pages/nav-head.php';
include 'includes/pages/navbarr.php';


require_once 'config/pdo.php';

function filtrage($data) {
    $data = stripslashes($data);
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

;?>

<div class="gestion gestion-add-oeuvre">
    <div class="oeuvre-unique-contain">

        <div class="oeuvre-unique-infos col">
        <?php include "includes/components/add-oeuvre-infos.php" ;?>
        </div> 

        <div class="oeuvre-unique-contenu col">
            <?php include "includes/components/add-oeuvre-description.php" ;?>
        </div>
        
    </div>
</div>


<?php 

include 'includes/pages/footer.php';

;?>