<?php 

function numInt($data) {
    $data = preg_match('/^[0-9]+$/', $data);
    return $data;
}

$sql = "SELECT * FROM exposition";
$requeteExposition = $db->query($sql);
$expositions = $requeteExposition->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM type_oeuvre";
$requeteType = $db->query($sql);
$types = $requeteType->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM position";
$requetePosition = $db->query($sql);
$positions = $requetePosition->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT Id_Artiste, Nom_Artiste, Prenom_Artiste FROM artiste";
$requeteArtiste = $db->query($sql);
$artistes = $requeteArtiste->fetchAll(PDO::FETCH_ASSOC); 

/* function fetchAllFromTable($db, $table, $columns = '*')
{
    $sql = "SELECT $columns FROM $table";
    $query = $db->query($sql);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
 
$expositions = fetchAllFromTable($db, 'exposition');
$types = fetchAllFromTable($db, 'type_oeuvre');
$positions = fetchAllFromTable($db, 'position');
$artistes = fetchAllFromTable($db, 'artiste', 'Id_Artiste, Nom_Artiste, Prenom_Artiste');
 */


if($_SERVER["REQUEST_METHOD"] == "POST") {

if(!empty($_POST["infos-submit"])) {
   if(isset($_POST["libelle"], $_POST["imgOeuvre"], $_POST["type"], $_POST["artiste"], $_POST["exposition"], $_POST["position"])
   && !empty($_POST["libelle"]) && !empty($_POST["imgOeuvre"]) && !empty($_POST["type"]) && !empty($_POST["artiste"]) && !empty($_POST["exposition"]) && !empty($_POST["position"])
   ){
       $libelle = filtrage($_POST["libelle"]);
       $libelleImg = filtrage($_POST["libelleImg"]);

       if(strlen($libelle) >= 150) {
           $error["libelle"] = "Le libellé est trop long";
       }

       if(strlen($libelleImg) >= 50) {
           $error["libelle"] = "Le libellé est trop long";
       }

       if(!numInt($_POST["hauteur"])) {
           $error = "La hauteur ne doit contenir que des numéros";
       }

       if(!numInt($_POST["largeur"])) {
           $error = "La largeur ne doit contenir que des numéros";
       }

       if(!numInt($_POST["profondeur"])) {
           $error = "La profondeur ne doit contenir que des numéros";
       }

       if(!numInt($_POST["poids"])) {
           $error = "Le poids ne doit contenir que des numéros";
       }

       if(!numInt($_POST["prix"])) {
           $error = "Le prix ne doit contenir que des numéros";
       }

       if(isset($_POST["state"]) && $_POST["state"]) {
           $_POST["state"] = 1;
           
       } else {
           $_POST["state"] = 0;
       }

       /* if(empty($_POST["libelle"])) {
        $erreur = "Ce champ est obligatoire.";
       }

       if(empty($_POST["imgOeuvre"])) {
        $erreur = "Ce champ est obligatoire.";
       }

       if(empty($_POST["libelleImg"])) {
        $erreur = "Ce champ est obligatoire.";
       }

       if(empty($_POST["type"])) {
        $erreur = "Ce champ est obligatoire.";
       }

       if(empty($_POST["exposition"])) {
        $erreur = "Ce champ est obligatoire.";
       }

       if(empty($_POST["position"])) {
        $erreur = "Ce champ est obligatoire.";
       } */

       /* if ($_FILES['imgOeuvre']['error'] === 0) {
           $tmp_path = $_FILES['imgOeuvre']['tmp_name'];
           $filename = uniqid() . '.' . pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
           $destination = 'artwork/' . $filename;
           move_uploaded_file($tmp_path, $destination);
       
       }  */
      
       $sql = "INSERT INTO oeuvres(libelle_Oeuvre, hauteur_Oeuvre, largeur_Oeuvre, profondeur_Oeuvre, poids_Oeuvre, prix, etat_Oeuvre, Id_Exposition, Id_position, Id_Type, Id_Artiste) VALUES (:libelle_Oeuvre, :hauteur_Oeuvre, :largeur_Oeuvre, :profondeur_Oeuvre, :poids_Oeuvre, :prix, :etat_Oeuvre, :Id_Exposition, :Id_Position, :Id_Type, :Id_Artiste)";
       $query = $db->prepare($sql);
       $query->bindValue(":libelle_Oeuvre", $libelle, PDO::PARAM_STR);
       $query->bindValue(":hauteur_Oeuvre", $_POST["hauteur"], PDO::PARAM_INT);
       $query->bindValue(":largeur_Oeuvre", $_POST["largeur"], PDO::PARAM_INT);
       $query->bindValue(":profondeur_Oeuvre", $_POST["profondeur"], PDO::PARAM_INT);
       $query->bindValue(":poids_Oeuvre", $_POST["poids"], PDO::PARAM_INT);
       $query->bindValue(":prix", $_POST["prix"], PDO::PARAM_INT);
       $query->bindValue(":etat_Oeuvre", $_POST["state"], PDO::PARAM_INT);
       $query->bindValue(":Id_Exposition", $_POST["exposition"], PDO::PARAM_INT);
       $query->bindValue(":Id_Position", $_POST["position"], PDO::PARAM_INT);
       $query->bindValue(":Id_Type", $_POST["type"], PDO::PARAM_INT);
       $query->bindValue(":Id_Artiste", $_POST["artiste"], PDO::PARAM_INT);
       $query->execute();

       $idOeuvre = $db->lastInsertId();

       $sql = "INSERT INTO image(libelle_Image, chemin_Image, Id_oeuvre) VALUES (:libelle_Image, :chemin_Image, :Id_Oeuvre)";
       $query = $db->prepare($sql);
       $query->bindValue(":libelle_Image", $_POST['libelleImg'], PDO::PARAM_STR); 
       $query->bindValue(":chemin_Image", $_POST['imgOeuvre'], PDO::PARAM_STR); 
       $query->bindValue(":Id_Oeuvre", $idOeuvre, PDO::PARAM_INT);
       $query->execute();

       $idImage = $db->lastInsertId();

       echo "Great";

   } else {
       die('oups');
   }
}

}

;?>

        <form action="" method="POST" enctype="multipart/form-data">

            <div class="div-libelle-add-oeuvre">
                <label for="libelle">Nom de l'oeuvre :</label>
                <input type="text" name="libelle" id="libelle" class="field-add-oeuvre">
                <span>*</span>
            </div>

            <div class="div-photo-add-oeuvre">
                <div class="arrow-left-btn">
                    <button><svg  viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></button>
                </div>
                <div class="container-img-oeuvre">
                    
                    <div class="image-svg-container">
                        <img src="assets/img/imgvide.webp" alt="">
                        <img id="preview-image" src="" alt="" >
                        <!-- <div class="add-img-plus">
                            <svg  viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                        </div> -->
                    </div>
                </div>
                <div class="arrow-right-btn">
                    <button><svg viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></button>
                </div>
            </div>
            <div>
                <span>*</span>
                <input type="file" name="imgOeuvre" id="imgOeuvre" accept="image/*">
                <input type="text" name="libelleImg" id="libelleImg" placeholder="Libellé de l'image">
            </div>
            <div class="div-infos-oeuvre">
                <div class="select-type-add-oeuvre">
                    <label for="artiste">Artiste :</label>
                    <select name="artiste" id="artiste">
                        <?php foreach($artistes as $artiste) :?>
                        <option value="<?php echo $artiste["Id_Artiste"]?>"><?php echo $artiste["Nom_Artiste"]?> <?php echo $artiste["Prenom_Artiste"]?></option>
                        <?php endforeach;?>
                    </select>
                    <span>*</span>
                    <div class="add-type-plus">
                        <a href="#">
                            <svg  viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                            <span>Créer</span>
                        </a>
                    </div>
                </div>
            
                <div class="select-type-add-oeuvre">
                    <label for="type">Type d'oeuvre :</label>
                    <select name="type" id="type">
                        <?php foreach($types as $type) :?>
                        <option value="<?php echo$type["Id_Type"]?>"><?php echo $type["libelle_Type"]?></option>
                        <?php endforeach;?>
                    </select>
                    <span>*</span>
                    <div class="add-type-plus">
                        <a href="#">
                            <svg  viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                            <span>Créer</span>
                        </a>
                    </div>
                </div>

                <div class="select-type-add-oeuvre">
                    <label for="exposition">Exposition: </label>
                    <select name="exposition" id="exposition">
                        <?php foreach($expositions as $exposition) :?>
                        <option value="<?php echo $exposition["Id_Exposition"]?>"><?php echo $exposition["libelle_Exposition"]?></option>
                        <?php endforeach;?>
                    </select>
                    <span>*</span>
                    <div class="add-type-plus">
                        <a href="#">
                            <svg  viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                            <span>Créer</span>
                        </a>
                    </div>
                </div>
                <div class="select-type-add-oeuvre">
                    <label for="position">Position :</label>
                    <select name="position" id="position">
                        <?php foreach($positions as $position) :?>
                        <option value="<?php echo $position["Id_Position"]?>"><?php echo $position["libelle_Position"]?></option>
                        <?php endforeach;?>
                    </select>
                    <span>*</span>
                </div>
                
                <div class="input-dimensions multi">
                    <div class="haut-oeuvre-add position">
                        <input type="text" class="dim-add-oeuvre" name="hauteur" id="hauteur" value="" placeholder="Hauteur">
                    </div>
                    <div class="larg-oeuvre-add position">
                        <input type="text" class="dim-add-oeuvre" name="largeur" id="largeur" value="" placeholder="Largeur">
                    </div>
                    <div class="prof-oeuvre-add position">
                        <input type="text" class="dim-add-oeuvre" name="profondeur" id="profondeur" value="" placeholder="Profondeur">
                    </div>
                </div>

                <div class="input-infos-supp multi">
                    <div class="info-poids-add">
                        <input type="text"  class="dim-add-oeuvre" name="poids" id="poids" value="" placeholder="Poids">
                    </div>
                    <div class="info-prix-add">
                        <input type="text"  class="dim-add-oeuvre" name="prix" id="prix" value="" placeholder="Prix">
                    </div>
                </div>

                <div>
                    <label for="state">Livrée</label>
                    <input type="checkbox" name="state" id="state">
                </div>
                
            </div>

            <div class="btn-submit-add-oeuvre">
                <input type="submit" name="infos-submit" id="infos-submit" value="Valider">
            </div>
        </form>
    
<script>
    const inputFile = document.querySelector(".div-photo-add-oeuvre input[type=file]");

    inputFile.addEventListener("change" function (event) {
        const file = event.target.file[0];
        const reader = new FileReader();
        reader.addEventListener('load', function () {
            const previewImage = document.querySelector('img#preview-image');
            previewImage.src = reader.result,
            previewImage.style.display = "block";
        });

        reader.readAsDataUrl(file);
    })
</script>

