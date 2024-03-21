<?php

session_start();
$title = "Mon tableau de bord";


include "includes/pages/header.php";
include "includes/pages/navbarr.php";
include "includes/pages/nav-head.php";

;?>


<div class="calendar">
    
    <?php echo ($_SESSION['user']) ;?>
</div>
<div class="calendar-daily">
    <?php ;?>
</div>
<div class="art-state">
    <?php include "includes/components/art-state.php";?>
</div>

<?php 
include "includes/pages/footer.php";
;?>