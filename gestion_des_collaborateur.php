<?php

$title = "Gestion des collaborateurs";

include "includes/pages/header.php";
include "includes/pages/nav-head.php";
include "includes/pages/navbarr.php";

require_once "./config/pdo.php";
$sql= "SELECT collaborateur.*, service.* FROM collaborateur JOIN service ON collaborateur.Id_Service = service.Id_Service";

$requete = $db -> query($sql);
$collabs = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="gestion">

<?php include 'includes/components/list-collab.php' ;?>

</div>

</body>
</html>