<?php 
session_start();

include "includes/pages/header.php";
include "includes/pages/nav-head.php";
include "includes/pages/navbarr.php";

require_once "config/pdo.php";

;?>

<div class="gestion">
  <?php include "includes/components/fiche-artiste.php";?>
</div>

<?php 

include "includes/pages/footer.php";

;?>