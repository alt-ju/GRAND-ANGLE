<?php
session_start();

$title = "Oeuvre - Contenu enrichi";

include "includes/pages/header.php";
include "includes/pages/nav-head.php";
include "includes/pages/navbarr.php";


;?>

<div class="gestion">
    <div class="contenu-content">
        <div class="contenu-enrichi-video">
            <?php include "includes/components/contenu-enrichi-video.php" ;?>
        </div>
        <div class="contenu-enrichi-audio">
            <?php include "includes/components/contenu-enrichi-audio.php" ;?>
        </div>
    </div>
</div>

<?php

include "includes/pages/footer.php";

;?>