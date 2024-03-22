<?php 

$id = $_GET['id'];

$sqlch = "SELECT Id_Langue, libelle_Langue FROM langue
WHERE Id_Langue = 6";
$requeteLangue = $db->query($sqlch);
$langueCh = $requeteLangue->fetch();
$ch = $langueCh['Id_Langue'];

$sqlLangues = "SELECT langue.Id_Langue, langue.libelle_Langue, oeuvres.Id_Oeuvres, oeuvres.libelle_Oeuvre, contenu.Id_Langue, contenu.libelle_Contenu, contenu.description_Contenu, contenu.Auteur_Contenu
FROM oeuvres 
JOIN contenu ON oeuvres.Id_Oeuvres = contenu.Id_Oeuvres
JOIN langue ON contenu.Id_Langue = langue.Id_Langue
WHERE oeuvres.Id_Oeuvres = :Id_oeuvre
AND contenu.Id_langue = :Id_langue";
$requeteLangues = $db->prepare($sqlLangues);
$requeteLangues->bindValue(":Id_oeuvre", $id, PDO::PARAM_INT);
$requeteLangues->bindValue(":Id_langue", $ch, PDO::PARAM_INT);
$requeteLangues->execute();
$languesTest = $requeteLangues->fetch();


;?>


<div id="ch">
    <form action="" method="POST" class="form">
        <div class="add-oeuvre-descr">
            <div class="add-description">
                <div class="div-select-oeuvre">
                    <label for="oeuvreConcCh">Oeuvre concernée : </label>
                    <select name="oeuvreConcCh" id="oeuvreConcCh">
                        <option value="<?= $languesTest['Id_Oeuvres'] ?>"><?= $languesTest['libelle_Oeuvre']?></option>
                    </select>
                </div>
                <div class="libelle-contenu">
                    <label for="libelleContenuCh">Nom de la description : </label>
                    <input type="text" name="libelleContenuCh" id="libelleContenuCh" value="<?= $languesTest['libelle_Contenu']?>">
                </div>
                <label for="descriptionCh">Description :</label>
                <textarea name="descriptionCh" id="descriptionCh" cols="40" rows="10"><?php echo $languesTest['description_Contenu'] ;?></textarea>
            </div>

            
            <div class="auteur-contain">
                <label for="auteurCh">Auteur :</label>
                <input type="text" name="auteurCh" id="auteurCh" value="<?= $languesTest['Auteur_Contenu']?>">
            </div>
            <div class="btn-submit-add-oeuvre btn-add-descr">
                <input type="submit" name="ch-description-submit" id="ch-description-submit" value="Valider">
            </div>  
        </div>   
    </form> 
</div>