<?php
require_once './config/pdo.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = 'SELECT *
        FROM dirart
        WHERE id_DirArt = :id';

    try {
        $requete = $db->prepare($sql);
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->execute();
        $dirArts = $requete->fetch();
    } catch (PDOException $e) {
        echo 'Erreur lors de la récupération du projet : ' . $e->getMessage();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ndart = $_POST['nom'];
        $pndr = $_POST['prenom'];
        $emdr = $_POST['email'];
        $telldr = $_POST['tel'];

        $sql = 'UPDATE dirart
                SET nom_DirArt = :nom_DirArt, 
                    prenom_DirArt = :prenom_DirArt,
                    email_DirArt = :email_DirArt,
                    tel_DirArt = :tel_DirArt
                WHERE id_DirArt  = :id';

        try {
            $requete = $db->prepare($sql);
            $requete->bindParam(":nom_DirArt", $ndart);
            $requete->bindParam(":prenom_DirArt", $pndr);
            $requete->bindParam(":email_DirArt", $emdr);
            $requete->bindParam(":tel_DirArt", $telldr);
            $requete->bindParam(":id", $id);
            $requete->execute();

            $message = "Succès de la modification de l'artiste et du thème";
            header("Location: card-dirart.php");
        } catch (PDOException $e) {
            echo 'Erreur lors de la mise à jour du projet : ' . $e->getMessage();
            exit();
        }
    }
} else {
    echo "La mise à jour n'est pas possible!";
    header("Location: card-dirart.php");
}
?>





<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/reset.css">
  <link rel="stylesheet" href="./assets/css/styleM.css">
  <title>form add directeur artistique</title>
</head>
<body>
  <form action="" method="POST" class="form-add-dirart">
    <h2 class="title-form-add-dirart">Ajouter un directeur artistique  </h2>
   <div class="form-divs-artist">
     <label for="nom" >Nom du directeur artistique : </label>
   </div>
   <div class="form-divs-artist">
   <input type="text"  id="nom" class="field-add-artist"  name="nom" placeholder="" value="<?php echo $dirArts['nom_DirArt'];?>">
   </div>
   <div class="form-divs-artist">
     <label for="prenom" >Prenom du directeur artistique :</label>
   </div>
   <div class="form-divs-artist">
   <input type="text" id="prenom" class="field-add-artist"  name="prenom" value="<?php echo $dirArts['prenom_DirArt'];?>" placeholder="">
   </div>

   <div class="form-divs-artist">
    <label for="email" >Email du directeur artistique : </label>
  </div>
  <div class="form-divs-artist">
  <input type="email"  id="email" class="field-add-artist"  name="email" placeholder="email@example.com" value="<?php echo $dirArts['email_DirArt'];?>">
  </div>
  <div class="form-divs-artist">
    <label for="tel" >Téléphone du directeur artistique : </label>
  </div>
  <div class="form-divs-artist">
  <input type="tel"  id="tel" class="field-add-artist"  name="tel" value="<?php echo $dirArts['tel_DirArt'];?>" >

  </div>
</div>
<div class="form-divs-artist login-input" >
  <input  type="submit" name="submit" class="input-sub-add-collab" value="Valider">
</div>


 </form>
</body>