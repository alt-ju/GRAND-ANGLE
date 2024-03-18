<?php 

$id = $_GET["id"];

$sqlfr = "SELECT Id_Langue, libelle_Langue FROM langue
WHERE Id_Langue = 1";
$requeteLangue = $db->query($sqlfr);
$langueFr = $requeteLangue->fetch();
$fr = $langueFr['Id_Langue'];

$sqlen = "SELECT Id_Langue, libelle_Langue FROM langue
WHERE Id_Langue = 2";
$requeteLangue = $db->query($sqlen);
$langueEn = $requeteLangue->fetch();
$en = $langueEn['Id_Langue'];

$sqlde = "SELECT Id_Langue, libelle_Langue FROM langue
WHERE Id_Langue = 3";
$requeteLangue = $db->query($sqlde);
$langueDe = $requeteLangue->fetch();
$de = $langueDe['Id_Langue'];

$sqlfa = "SELECT Id_Langue, libelle_Langue FROM langue
WHERE Id_Langue = 4";
$requeteLangue = $db->query($sqlfa);
$langueFa = $requeteLangue->fetch();
$fa = $langueFa['Id_Langue'];

$sqlch = "SELECT Id_Langue, libelle_Langue FROM langue
WHERE Id_Langue = 6";
$requeteLangue = $db->query($sqlch);
$langueCh = $requeteLangue->fetch();
$ch = $langueCh['Id_Langue'];

if(!isset($_GET['langues'])) {
    $_GET['langues'] = $fr;
} 
 
$langueArray = array($fr, $en, $de, $fa, $ch);

$id_langue = $_GET['langues'];

$sqlLangues = "SELECT langue.Id_Langue, langue.libelle_Langue, oeuvres.Id_oeuvre, oeuvres.libelle_Oeuvre, contenu.libelle_Contenu, contenu.description_Contenu, contenu.Auteur_Contenu
FROM oeuvres 
JOIN contenu ON oeuvres.Id_oeuvre = contenu.Id_oeuvre
JOIN langue ON contenu.Id_Langue = langue.Id_Langue
WHERE oeuvres.Id_oeuvre = :Id_oeuvre
AND contenu.Id_langue = :Id_langue";
$requeteLangues = $db->prepare($sqlLangues);
$requeteLangues->bindValue(":Id_oeuvre", $id, PDO::PARAM_INT);
$requeteLangues->bindValue(":Id_langue", $id_langue, PDO::PARAM_INT);
$requeteLangues->execute();
$languesTest = $requeteLangues->fetch();


/* $sql = "SELECT * FROM langue";
$requeteLangue = $db->query($sql);
$langues = $requeteLangue->fetchAll(PDO::FETCH_ASSOC); */



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
                <label for="libelleContenu">Nom de la description : </label>
                <input type="text" name="libelleContenu" id="libelleContenu" value="<?= $languesTest['libelle_Contenu']?>">
            </div>
            <label for="description">Description :</label>
            <textarea name="description" id="description" cols="40" rows="10"><?php echo $languesTest['description_Contenu'] ;?></textarea>
        </div>

        <div class="div-select-oeuvre">
            <label for="oeuvreConc">Oeuvre concernée : </label>
            <select name="oeuvreConc" id="oeuvreConc">
                <option value="<?= $languesTest['Id_oeuvre'] ?>"><?= $languesTest['libelle_Oeuvre']?></option>
            </select>
        </div>
                
        <div class="div-select-langue">
            <form action="" method="GET" id="select-lang">
                <label for="langues">Langues : </label>
                <select name="langues" id="langues" onchange="selectLang();">
                    <?php foreach($languesTest as $langue) :?>
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
            <input type="text" name="auteur" id="auteur" value="<?= $languesTest['Auteur_Contenu']?>">
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