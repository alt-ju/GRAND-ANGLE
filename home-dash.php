<?php

$title = "Mon tableau de bord";
include "includes/pages/header.php";

;?>


<div class="avatar-nav">
    <img src="assets/img/avatar.jpeg" alt="">
    <h1>Nom Prénom</h1>
    <ul>
        <li><a href="#">Paramètres</a></li>
        <li><a href="#">Grand Angle</a></li>
        <li><a href="#">Collaborateurs</a></li>
    </ul>
</div>

<div class="quick-nav">
    <ul>
        <li><a href="#">Liste des expositions</a></li>
        <li><a href="#">Liste des artistes</a></li>
        <li><a href="#">Implantation</a></li>
    </ul>
</div>

<div class="main-nav">
    <div id="calendar">
    
    </div>
    <div class="add-buttons">
        <input class="dash" type="button" value="Ajouter une exposition">
        <input class="dash" type="button" value="Ajouter un artiste">
        <input class="dash" type="button" value="Ajouter une oeuvre">
        <div>
            <input class="dash" type="button" value="Plan de l'exposition">
            <input class="short dash" type="button" value="+">
        </div>
    </div>
</div>

<div class="art-state">
    <h2>Etat des oeuvres :</h2>
    <div>
        <div class="first-art">
             <img src="assets/img/freud_strawberries.jpg" alt="">
             <p>id_oeuvre</p>
             <p>Livrée</p>
        </div> 
    </div>
</div>




