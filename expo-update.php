<?php

session_start();

include "includes/pages/header.php";
include "includes/pages/navbarr.php";
include "includes/pages/nav-head.php";


require_once './config/pdo.php';

?>

<div class="gestion">
  <?php include "includes/components/compo-update-expo.php";?>
</div>

<?php include "includes/pages/footer.php";?>