<?php 

require_once "./config/pdo.php";
$sql = "SELECT oeuvres.Id_oeuvre, oeuvres.etat_Oeuvre, Image.libelle_Image, Image.chemin_Image, exposition.Date_Debut, artiste.Id_Artiste
FROM oeuvres
JOIN image ON oeuvres.Id_oeuvre = image.Id_oeuvre
JOIN artiste ON artiste.Id_Artiste = oeuvres.Id_Artiste
JOIN exposition ON oeuvres.Id_Exposition = exposition.Id_Exposition 
WHERE exposition.Date_Debut >= CURRENT_DATE()
AND exposition.Date_Debut <= DATE_ADD(CURRENT_DATE(), INTERVAL 20 DAY)
ORDER BY exposition.Date_Debut ASC, oeuvres.etat_Oeuvre ASC";
$requete = $db->query($sql);
$oeuvres = $requete->fetchAll(PDO::FETCH_ASSOC);
$db = null;

;?>

 <div class="slider-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
        <?php forEach($oeuvres as $oeuvre) : ?>
            <div class="card swiper-slide">
                <div class="image-content">
                    <div class="card-image">
                        <img src=".<?= $oeuvre["chemin_Image"];?>" alt="" class="card-img">
                    </div>
                    <div clas="card-content">
                        <h2 class="name"><?= $oeuvre["libelle_Image"];?></h2>
                        <?php if($oeuvre["etat_Oeuvre"] === 0): ?>
                        <span>Pas livrée</span>
                        <?php else : ?>
                        <span>Livrée</span>
                        <?php endif ;?>
                    </div>
                </div>
            </div>
        <?php endforeach ;?>
        </div>
    </div>

    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
 </div>

 <script src="assets/javascript/swiper-bundle.min.js"></script>

 <script>
    
let swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 25,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints:{
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        },
    },
  });
 </script>