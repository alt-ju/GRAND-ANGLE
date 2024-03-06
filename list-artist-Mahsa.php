<?php

$title = "Liste des artistes";

include "includes/pages/header.php";
include "includes/pages/nav-head.php";
include "includes/pages/navbarr.php";

require_once "./config/pdo.php";
$sql = "SELECT artiste.*, dirart.* FROM artiste LEFT JOIN dirart ON artiste.id_DirArt = dirart.id_DirArt ORDER BY artiste.Id_Artiste ASC";
$requete = $db -> query($sql);
$artists = $requete->fetchAll(PDO::FETCH_ASSOC);
$db = null;

?>

<div class="container-list-artist">

 <?php include "includes/components/artists.php";?>

</div>

</body>
</html>