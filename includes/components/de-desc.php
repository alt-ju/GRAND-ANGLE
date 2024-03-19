<?php 

$id = $_GET['id'];

$sqlde = "SELECT Id_Langue, libelle_Langue FROM langue
WHERE Id_Langue = 3";
$requeteLangue = $db->query($sqlde);
$langueDe = $requeteLangue->fetch();
$de = $langueDe['Id_Langue'];


$sqlLangues = "SELECT langue.Id_Langue, langue.libelle_Langue, oeuvres.Id_oeuvre, oeuvres.libelle_Oeuvre, contenu.Id_Langue, contenu.libelle_Contenu, contenu.description_Contenu, contenu.Auteur_Contenu
FROM oeuvres 
JOIN contenu ON oeuvres.Id_oeuvre = contenu.Id_oeuvre
JOIN langue ON contenu.Id_Langue = langue.Id_Langue
WHERE oeuvres.Id_oeuvre = :Id_oeuvre
AND contenu.Id_langue = :Id_langue";
$requeteLangues = $db->prepare($sqlLangues);
$requeteLangues->bindValue(":Id_oeuvre", $id, PDO::PARAM_INT);
$requeteLangues->bindValue(":Id_langue", $de, PDO::PARAM_INT);
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

    if(isset($_POST['de-description-submit']) && !empty($_POST['de-description-submit'])) {
        $sqlDesc = ("UPDATE contenu SET contenu.description_Contenu = :description, contenu.Auteur_Contenu = :auteur, contenu.libelle_contenu = :libelle
        WHERE contenu.Id_oeuvre = :id_oeuvre
        AND contenu.Id_langue = :id_langue");
        try{
            $requeteDesc->bindValue(":id_oeuvre", $id, PDO::PARAM_STR);
            $requeteDesc->bindValue(":id_langue", $de, PDO::PARAM_STR);
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


<div id="de">
    <form action="" method="POST" class="form">
        <div class="add-oeuvre-descr">
            <div class="add-description">
                <div class="div-select-oeuvre">
                    <label for="oeuvreConcDe">Oeuvre concernée : </label>
                    <select name="oeuvreConcDe" id="oeuvreConcDe">
                        <option value="<?= $languesTest['Id_oeuvre'] ?>"><?= $languesTest['libelle_Oeuvre']?></option>
                    </select>
                </div>
                <div class="libelle-contenu">
                    <label for="libelleContenuDe">Nom de la description : </label>
                    <input type="text" name="libelleContenuDe" id="libelleContenuDe" value="<?= $languesTest['libelle_Contenu']?>">
                </div>
                <label for="descriptionDe">Description :</label>
                <textarea name="descriptionDe" id="descriptionDe" cols="40" rows="10"><?php echo $languesTest['description_Contenu'] ;?></textarea>
            </div>

            
            <div class="auteur-contain">
                <label for="auteurDe">Auteur :</label>
                <input type="text" name="auteurDe" id="auteurDe" value="<?= $languesTest['Auteur_Contenu']?>">
            </div>
            <div class="btn-submit-add-oeuvre btn-add-descr">
                <input type="submit" name="de-description-submit" id="de-description-submit" value="Valider">
            </div>  
        </div>   
    </form> 
</div>