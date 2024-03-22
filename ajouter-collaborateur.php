<?php

session_start();

$title = "Ajouter un collaborateur";

include "includes/pages/header.php";
include "includes/pages/nav-head.php";
include "includes/pages/navbarr.php";

require_once "./config/pdo.php";

;?>

<div class="gestion">

    <?php include 'includes/components/add_collab.php' ;?>

</div>

<?php 

include "includes/pages/footer.php";

;?>