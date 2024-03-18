<?php 


;?>
<div class="btn-update-description">
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
    <div class="add-langue-plus">
        <a href="#">
            <svg viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
            <span>Créer</span>
        </a>
    </div>
</div>

<div class="update-description-by-btn">
    <div class="composant">
        <?php include "includes/components/fr-desc.php";?>
    </div>

    <div class="composant">
        <?php include "includes/components/en-desc.php";?>
    </div>

    <div class="composant">
        <?php include "includes/components/de-desc.php";?>
    </div>

    <div class="composant">
        <?php include "includes/components/fa-desc.php";?>
    </div>

    <div class="composant">
        <?php include "includes/components/ch-desc.php";?>
    </div>
</div>


<script>

    const divFr = document.getElementById('fr');
    const divEn = document.getElementById('en');
    const divDe = document.getElementById('de');
    const divFa = document.getElementById('fa');
    const divCh = document.getElementById('ch');

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