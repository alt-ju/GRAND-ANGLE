<?php 

/* $auteur = $_SESSION["user"]["nom"]. " " . $_SESSION["user"]["prenom"]; */

$sql = "SELECT * FROM langue";

try {
$requeteLangue = $db->query($sql);
$langues = $requeteLangue->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Erreur langue" . $e->getMessage();
} 

$sql = "SELECT Id_Oeuvre, libelle_Oeuvre, Nom_Artiste, Prenom_Artiste
        FROM oeuvres 
        JOIN artiste ON oeuvres.Id_Artiste = artiste.Id_Artiste";

try {
$requeteOeuvre = $db->query($sql);
$oeuvres = $requeteOeuvre->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur artiste" . $e->getMessage(); 
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

if(!empty($_POST["description-submit"])) {
    if(isset($_POST["description"], $_POST["langues"], $_POST["oeuvre"], $_POST["libelleContenu"], $_POST["auteur"])
    && !empty($_POST["description"]) && !empty($_POST["langues"]) && !empty($_POST["libelleContenu"]) && !empty($_POST["auteur"]) && !empty($_POST["oeuvre"])) {

        $description = filtrage($_POST["description"]);

        $sqlDescr = "INSERT INTO contenu(description_Contenu, Auteur_Contenu, libelle_contenu, Id_oeuvre, Id_Langue) VALUES (:description_Contenu, :Auteur_Contenu, :libelle_contenu, :Id_oeuvre, :Id_Langue)";
        $query = $db->prepare($sqlDescr);
        $query->bindValue(":description_Contenu", $_POST["description"], PDO::PARAM_STR);
        $query->bindValue(":Auteur_Contenu", $_POST["auteur"], PDO::PARAM_STR);
        $query->bindValue(":libelle_contenu", $_POST["libelleContenu"], PDO::PARAM_STR);
        $query->bindValue(":Id_oeuvre", $_POST["oeuvreConc"], PDO::PARAM_INT);
        $query->bindValue(":Id_Langue", $_POST["langues"], PDO::PARAM_INT);
        $query->execute();

        $idDesc = $db->lastInsertId();

        echo "Done";
    } else {
        die("Wrong");
    }
}

}


;?>


<form action="" method="POST">
    <div class="add-oeuvre-descr">
        <div class="add-description">
            <div>
                <h2>Dernière modification faite par :</h2>
                <span>Nom Prénom Collaborateur</span>
            </div>
            <div class="libelle-contenu">
                <label for="libelleContenu">Libellé de la description</label>
                <input type="text" name="libelleContenu" id="libelleContenu">
            </div>
            <label for="description">Description  </label>
            <textarea name="description" id="description" cols="40" rows="10"></textarea>
        </div>

        <div class="div-select-oeuvre">
            <label for="oeuvreConc">Oeuvre concernée : </label>
            <select name="oeuvreConc" id="oeuvreConc">
                <?php foreach($oeuvres as $oeuvre) :?>
                <option value="<?php echo $oeuvre["Id_Oeuvre"];?>"><?= $oeuvre["libelle_Oeuvre"]?> - <?php echo $oeuvre["Nom_Artiste"];?> <?php echo $oeuvre["Prenom_Artiste"] ;?></option>
                <?php endforeach ;?>
            </select>
        </div>
                
        <div class="div-select-langue">
            <label for="langues">Langues : </label>
            <select name="langues" id="langues">
                <?php foreach($langues as $langue) :?>
                <option value="<?php echo $langue["Id_Langue"] ;?>"><?php echo $langue["libelle_Langue"];?></option>
                <?php endforeach; ?>
            </select>

            <div class="add-langue-plus">
                <a href="#">
                    <svg viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                    <span>Créer</span>
                </a>
            </div>
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
            
        <div class="oeuvre-contenu-supp">
            <div class="btn-page-contenu">
                <button><a href="contenu-enrichi.php">Voir le contenu enrichi</a></button>
            </div>
            <div class="div-qrcode">

            </div>
            <div class="compteur-consult">

            </div>
            <div class="consultations">
                <p>Nombre de consultations : 0</p>
            </div>
        </div>