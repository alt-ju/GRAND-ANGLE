<?php 

$id = $_GET['id'];

$sqlfa = "SELECT Id_Langue, libelle_Langue FROM langue
WHERE Id_Langue = 4";
$requeteLangue = $db->query($sqlfa);
$langueFa = $requeteLangue->fetch();
$fa = $langueFa['Id_Langue'];

$sqlLangues = "SELECT langue.Id_Langue, langue.libelle_Langue, oeuvres.Id_Oeuvres, oeuvres.libelle_Oeuvre, contenu.Id_Langue, contenu.libelle_Contenu, contenu.description_Contenu, contenu.Auteur_Contenu
FROM oeuvres 
JOIN contenu ON oeuvres.Id_Oeuvres = contenu.Id_Oeuvres
JOIN langue ON contenu.Id_Langue = langue.Id_Langue
WHERE oeuvres.Id_Oeuvres = :Id_oeuvre
AND contenu.Id_Langue = :Id_langue";
$requeteLangues = $db->prepare($sqlLangues);
$requeteLangues->bindValue(":Id_oeuvre", $id, PDO::PARAM_INT);
$requeteLangues->bindValue(":Id_langue", $fa, PDO::PARAM_INT);
$requeteLangues->execute();
$languesTest = $requeteLangues->fetch();

;?>


<div class="fa">
    <form action="" method="POST" class="form">
        <div class="add-oeuvre-descr">
            <div class="add-description">
                <div class="div-select-oeuvre">
                    <label for="oeuvreConcFa">Oeuvre concernée : </label>
                    <select name="oeuvreConcFa" id="oeuvreConcFa">
                        <option value="<?= $languesTest['Id_Oeuvres'] ?>"><?= $languesTest['libelle_Oeuvre']?></option>
                    </select>
                </div>
                <div class="libelle-contenu">
                    <label for="libelleContenuFa">Nom de la description : </label>
                    <input type="text" name="libelleContenuFa" id="libelleContenuFa" value="<?= $languesTest['libelle_Contenu']?>">
                </div>
                <label for="descriptionFa">Description :</label>
                <textarea name="descriptionFa" id="descriptionFa" cols="40" rows="10"><?php echo $languesTest['description_Contenu'] ;?></textarea>
            </div>

            
            <div class="auteur-contain">
                <label for="auteurFa">Auteur :</label>
                <input type="text" name="auteurFa" id="auteurFa" value="<?= $languesTest['Auteur_Contenu']?>">
            </div>
            <div class="btn-submit-add-oeuvre btn-add-descr">
                <input type="submit" name="fa-description-submit" id="fa-description-submit" value="Valider">
            </div>  
        </div>   
    </form> 
</div>