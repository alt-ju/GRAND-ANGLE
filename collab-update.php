<?php

session_start();

$title = "Modifier les informations d'un collaborateur";

require_once './config/pdo.php';

include "includes/pages/header.php";
include "includes/pages/nav-head.php";
include "includes/pages/navbarr.php";

?>

<div class="gestion">
  <?php include "includes/components/compo-collab-update.php";?>
</div>

  
<?php include "includes/pages/footer.php" ;?>