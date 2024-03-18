<?php 

$id = $_GET["id"];

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


;?>


<div id="de">
    <form action="" method="POST">
        <div class="add-oeuvre-descr">
            <div class="add-description">
                <div class="div-select-oeuvre">
                    <label for="oeuvreConc">Oeuvre concernée : </label>
                    <select name="oeuvreConc" id="oeuvreConc">
                        <option value="<?= $languesTest['Id_oeuvre'] ?>"><?= $languesTest['libelle_Oeuvre']?></option>
                    </select>
                </div>
                <div class="libelle-contenu">
                    <label for="libelleContenu">Nom de la description : </label>
                    <input type="text" name="libelleContenu" id="libelleContenu" value="<?= $languesTest['libelle_Contenu']?>">
                </div>
                <label for="description">Description :</label>
                <textarea name="description" id="description" cols="40" rows="10"><?php echo $languesTest['description_Contenu'] ;?></textarea>
            </div>

            
            <div class="auteur-contain">
                <label for="auteur">Auteur :</label>
                <input type="text" name="auteur" id="auteur" value="<?= $languesTest['Auteur_Contenu']?>">
            </div>
            <div class="btn-submit-add-oeuvre btn-add-descr">
                <input type="submit" name="description-submit" id="description-submit" value="Valider">
            </div>  
        </div>   
    </form> 
</div>