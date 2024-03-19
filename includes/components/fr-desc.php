<?php 

$id = $_GET['id'];

$sqlfr = "SELECT Id_Langue, libelle_Langue FROM langue
WHERE Id_Langue = 1";
$requeteLangue = $db->query($sqlfr);
$langueFr = $requeteLangue->fetch();
$fr = $langueFr['Id_Langue'];

$sqlLangues = "SELECT langue.Id_Langue, langue.libelle_Langue, oeuvres.Id_oeuvre, oeuvres.libelle_Oeuvre, contenu.Id_Langue, contenu.libelle_contenu, contenu.description_Contenu, contenu.Auteur_Contenu
FROM oeuvres 
JOIN contenu ON oeuvres.Id_oeuvre = contenu.Id_oeuvre
JOIN langue ON contenu.Id_Langue = langue.Id_Langue
WHERE oeuvres.Id_oeuvre = :Id_oeuvre
AND contenu.Id_langue = :Id_langue";
$requeteLangues = $db->prepare($sqlLangues);
$requeteLangues->bindValue(":Id_oeuvre", $id, PDO::PARAM_INT);
$requeteLangues->bindValue(":Id_langue", $fr, PDO::PARAM_INT);
$requeteLangues->execute();
$languesTest = $requeteLangues->fetch();

/* if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $libelleDescription = $_POST['libelleContenu'];
    $description = $_POST['description'];
    $oeuvreConc = $_POST['oeuvreConc'];
    $auteur = $_POST['auteur'];

    var_dump($libelleDescription);
    var_dump($description);
    var_dump($auteur);

    var_dump($id);
    var_dump($fr);


    if(isset($_POST['fr-description-submit']) && !empty($_POST['fr-description-submit'])) {
        $sqlDesc = ("UPDATE contenu SET contenu.description_Contenu = :description, contenu.Auteur_Contenu = :auteur, contenu.libelle_contenu = :libelle
        WHERE contenu.Id_oeuvre = :id_oeuvre
        AND contenu.Id_langue = :id_langue");
        try{
            $requeteDesc->bindValue(":id_oeuvre", $id, PDO::PARAM_STR);
            $requeteDesc->bindValue(":id_langue", $fr, PDO::PARAM_STR);
            $requeteDesc = $db->prepare($sqlDesc);
            $requeteDesc->execute([
            ":description" => $description,
            ":libelle" => $libelleDescription,
            ":auteur" => $auteur
        ]);
        } catch (PDOException $e){
            echo 'erreur' . $e->getMessage();
            exit();
        }
        
        
    }
} */

;?>

<div id="fr">
    <form action="" method="POST" class="form">
        <div class="add-oeuvre-descr">
            <div class="add-description">
                <div class="div-select-oeuvre">
                    <label for="oeuvreConcFr">Oeuvre concernée : </label>
                    <select name="oeuvreConcFr" id="oeuvreConcFr">
                        <option value="<?= $languesTest['Id_oeuvre'] ?>"><?= $languesTest['libelle_Oeuvre']?></option>
                    </select>
                </div>
                <div class="libelle-contenu">
                    <label for="libelleContenuFr">Nom de la description : </label>
                    <input type="text" name="libelleContenuFr" id="libelleContenuFr" value="<?= $languesTest['libelle_contenu']?>">
                </div>
                <label for="descriptionFr">Description :</label>
                <textarea name="descriptionFr" id="descriptionFr" cols="40" rows="10" value="<?= $languesTest['description_Contenu']?>"><?php echo $languesTest['description_Contenu'] ;?></textarea>
            </div>
            <div class="auteur-contain">
                <label for="auteurFr">Auteur :</label>
                <input type="text" name="auteurFr" id="auteurFr" value="<?= $languesTest['Auteur_Contenu']?>">
            </div>
            <div class="btn-submit-add-oeuvre btn-add-descr">
                <input type="submit" name="fr-description-submit" id="fr-description-submit" value="Valider">
            </div>  
        </div>   
    </form> 
</div>