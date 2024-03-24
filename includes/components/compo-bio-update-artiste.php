<?php 

require_once "./config/pdo.php";

$sqlArtConc = "SELECT * FROM artiste";
try {
    $queryArtConc = $db->query($sqlArtConc);
    $artisteConc = $queryArtConc->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'erreur sql' . $e->getMessage();
}

;?>

<div class="bio-artiste-add">
    <form action=""  enctype="multipart/form-data">
      
        <div class="btn-update-description spe-add-artiste">
            <div id="fr-btn" class="btn-langue">
                <button>Français</button>
            </div>
            <div id="en-btn" class="btn-langue">
                <button>Anglais</button>
            </div>
            <div id="de-btn" class="btn-langue">
                <button>Allemand</button>
            </div>
            <div id="fa-btn" class="btn-langue">
                <button>Farsi</button>
            </div>
            <div id="ch-btn" class="btn-langue">
                <button>Chinois</button>
            </div>
        </div>

        <div class="update-description-by-btn">
            <div class="composant">
                <?php include "includes/components/bio/fr-bio.php";?>
            </div>

            <div class="composant">
                <?php include "includes/components/bio/en-bio.php";?>
            </div>

            <div class="composant">
                <?php include "includes/components/bio/de-bio.php";?>
            </div>

            <div class="composant">
                <?php include "includes/components/bio/fa-bio.php";?>
            </div>

            <div class="composant">
                <?php include "includes/components/bio/ch-bio.php";?>
            </div>
        </div>
    </form>

</div>

<script>

    const divFr = document.querySelector('.fr');
    const divEn = document.querySelector('.en');
    const divDe = document.querySelector('.de');
    const divFa = document.querySelector('.fa');
    const divCh = document.querySelector('.ch');

   document.addEventListener("DOMContentLoaded", function() {
        divEn.style.display = 'none';
        divDe.style.display = 'none';
        divFa.style.display = 'none';
        divCh.style.display = 'none';
        divFr.style.display = 'block';

    }) 

    const btnFr = document.getElementById('fr-btn')
    btnFr.addEventListener('click', function () {
        divEn.style.display = 'none';
        divDe.style.display = 'none';
        divFa.style.display = 'none';
        divCh.style.display = 'none';
        divFr.style.display = 'block';
    })

    const btnEn = document.getElementById('en-btn')
    btnEn.addEventListener('click', function () {
        divEn.style.display = 'block';
        divDe.style.display = 'none';
        divFa.style.display = 'none';
        divCh.style.display = 'none';
        divFr.style.display = 'none';
    })

    const btnDe = document.getElementById('de-btn')
    btnDe.addEventListener('click', function () {
        divEn.style.display = 'none';
        divDe.style.display = 'block';
        divFa.style.display = 'none';
        divCh.style.display = 'none';
        divFr.style.display = 'none';
    })

    const btnFa = document.getElementById('fa-btn')
    btnFa.addEventListener('click', function () {
        divEn.style.display = 'none';
        divDe.style.display = 'none';
        divFa.style.display = 'block';
        divCh.style.display = 'none';
        divFr.style.display = 'none';
    })

    const btnCh = document.getElementById('ch-btn')
    btnCh.addEventListener('click', function () {
        divEn.style.display = 'none';
        divDe.style.display = 'none';
        divFa.style.display = 'none';
        divCh.style.display = 'block';
        divFr.style.display = 'none';
    })


</script>