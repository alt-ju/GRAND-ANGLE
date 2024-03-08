<?php

$title = "Ajouter une oeuvre";

include 'includes/pages/header.php';
include 'includes/pages/nav-head.php';
include 'includes/pages/navbarr.php';

function filtrage($data) {
    $data = stripslashes($data);
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function numInt($data) {
     $data = preg_match('/^[0-9]+$/', $data);
     return $data;
}

if(!empty($_POST)) {
    if(isset($_POST["libelle"], $_POST["imgOeuvre"], $_POST["type"], $_POST["artiste"], $_POST["exposition"], $_POST["position"])
    && !empty($_POST["libelle"]) && !empty($_POST["imgOeuvre"]) && !empty($_POST["type"]) && !empty($_POST["artiste"]) && !empty($_POST["exposition"]) && !empty($_POST["position"])
    ){
        $libelle = filtrage($_POST["libelle"]);

        if(strlen($libelle) >= 150) {
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

        require_once 'config/pdo.php';
        $sql = "INSERT INTO "






    }
}

;?>

<div class="gestion gestion-add-oeuvre">
<div class="oeuvre-unique-contain">

    <div class="oeuvre-unique-infos col">
        <form action="" method="POST">

            <div class="div-libelle-add-oeuvre">
                <label for="libelle">Libellé de l'oeuvre :</label>
                <input type="text" name="libelle" id="libelle" class="field-add-oeuvre">
                <span>*</span>
            </div>

            <div class="div-photo-add-oeuvre">
                <div class="arrow-left-btn">
                    <button><svg  viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></button>
                </div>
                <div class="container-img-oeuvre">
                    <span>*</span>
                    <input type="file" name="imgOeuvre" id="imgOeuvre" accept="image/*">
                    <div class="add-img-plus">
                        <svg  viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                    </div>
                </div>
                <div class="arrow-right-btn">
                    <button><svg viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></button>
                </div>
            </div>

            <div class="div-infos-oeuvre">
                
                <div class="select-type-add-oeuvre">
                    <select name="artiste" id="artiste">
                        <option value="">Artiste</option>
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
                    <select name="type" id="type">
                        <option value="">Type d'oeuvres</option>
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
                    <select name="exposition" id="exposition">
                        <option value="">Exposition</option>
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
                    <select name="position" id="position">
                        <option value="">Position</option>
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
                
            </div>

            <div class="btn-submit-add-oeuvre">
                <input type="submit" name="" id="" value="Valider">
            </div>
        </form>
    </div>

    <div class="oeuvre-unique-contenu col"> 
        <div class="add-oeuvre-descr">
            <div class="add-description">
                <div>
                    <h2>Dernière modification faite par :</h2>
                    <span>Nom Prénom Collaborateur</span>
                </div>
                <textarea name="description" id="description" cols="40" rows="20"></textarea>
            </div>
            <div class="div-select-langue">
                <select name="langues" id="langues">
                    <option value="">Langues</option>
                </select>

                <div class="add-langue-plus">
                    <a href="#">
                        <svg viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                        <span>Créer</span>
                    </a>
                </div>
                <div class="btn-submit-add-oeuvre btn-add-descr">
                    <input type="submit" name="" id="" value="Valider">
                </div>  
            </div>
            
            <div>

            </div>
        </div>
        <div class="oeuvre-contenu-supp">
            <div class="btn-page-contenu">
                <button><a href="">Voir le contenu enrichi</a></button>
            </div>
            <div class="div-qrcode">

            </div>
            <div class="compteur-consult">

            </div>
            <div class="consultations">
                <p>Nombre de consultations : 0</p>
            </div>
        </div>

        
    </div>
</div>
</div>


<?php 

include 'includes/pages/footer.php';

;?>