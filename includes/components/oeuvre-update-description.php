<?php 

$id = $_GET["id"];

$sql = "SELECT Id_Langue, libelle_Langue FROM langue
WHERE Id_Langue = 1";
$requeteLangue = $db->query($sql);
$langues = $requeteLangue->fetch();
$fr = $langues['Id_Langue'];


echo $fr;


$sql = "SELECT * FROM contenu";
$requeteContenu = $db->query($sql);
$contenu = $requeteContenu->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT oeuvres.Id_Oeuvre, oeuvres.libelle_Oeuvre, artiste.Nom_Artiste, artiste.Prenom_Artiste
        FROM oeuvres 
        JOIN artiste ON oeuvres.Id_Artiste = artiste.Id_Artiste
        WHERE oeuvres.Id_Oeuvre = :id";

try {
    $requete = $db->prepare($sql);
    $requete->bindValue(":id", $id, PDO::PARAM_INT);
    $requete->execute();
    $oeuvre = $requete->fetch();
} catch (PDOException $e) {
    echo "Erreur de lors de la récupération du projet" . $e->getMessage();
}

/* if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $libelleDescription = $_POST['libelleContenu'];
    $description = $_POST['description'];
    $langues = $_POST['langues'];
    $oeuvreConc = $_POST['oeuvreConc'];
    $auteur = $_POST['auteur'];
} 
 */
;?>

<form action="" method="POST">
    <div class="add-oeuvre-descr">
        <div class="add-description">
            <div>
                <h2>Dernière modification faite par :</h2>
                <span>Nom Prénom Collaborateur</span>
            </div>
            <div class="libelle-contenu">
                <label for="libelleContenu"></label>
                <input type="text" name="libelleContenu" id="libelleContenu">
            </div>
            <label for="description">Description :</label>
            
            <textarea name="description" id="description" cols="40" rows="10"></textarea>
        </div>

        <div class="div-select-oeuvre">
            <label for="oeuvreConc">Oeuvre concernée : </label>
            <select name="oeuvreConc" id="oeuvreConc">
                <?php foreach($oeuvres as $oeuvre) :?>
                <option id="<?= $oeuvre["Id_Oeuvre"]?>" value="<?= $oeuvre["Id_Oeuvre"] ?>"><?= $oeuvre["libelle_Oeuvre"]?> - <?= $oeuvre["Nom_Artiste"] ?> <?= $oeuvre["Prenom_Artiste"] ?></option>
                <?php endforeach ;?>
            </select>
        </div>
                
        <div class="div-select-langue">
            <form action="" method="GET" id="select-lang">
                <label for="langues">Langues : </label>
                <select name="langues" id="langues" onchange="selectLang();">
                    <?php foreach($langues as $langue) :?>
                    <option id="<?= $langue["Id_Langue"] ?>" type="radio" value="<?= $langue["Id_Langue"] ?>" <?php if(isset($_GET['langues']) && $_GET['langues'] == $langue['Id_Langue']) {echo 'selected';} ?>> <?= $langue["libelle_Langue"] ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="add-langue-plus">
                    <a href="#">
                        <svg viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                        <span>Créer</span>
                    </a>
                </div>
            </form>
        </div>
        <div class="auteur-contain">
            <label for="auteur">Auteur :</label>
            <input type="text" name="auteur" id="auteur">
        </div>
        <div class="btn-submit-add-oeuvre btn-add-descr">
            <input type="submit" name="description-submit" id="description-submit" value="Valider">
        </div>  
    </div>   
</form> 


<script>
    function selectLang() {
        document.getElementById('select-lang').submit();
    }
</script>