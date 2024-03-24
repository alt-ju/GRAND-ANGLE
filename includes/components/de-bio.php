
<div class="de">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="img-container-add-artiste">
            <div class="img-content-add-artiste">
                <img id="preview-img-artiste-de" src="./img-artiste/<?= $bioDe['chemin_ImgArt']?>" alt="">
                <img id="preview-de" src="" alt="">  
            </div>
            <div class="input-photo-artiste">
                <?php $imgUrl = !empty($bioDe['chemin_ImgArt']) && file_exists($bioDe['chemin_ImgArt']) ? $bioDe['chemin_ImgArt'] : "./assets/img/imgvide.webp";?>
                
                <label for="photo-artiste">Photo de l'artiste :</label>
                <input type="file" id="photo-artiste-de" name="photo-artiste-de" accept="image/*">
                <img src="" alt="">
            </div>
        </div>
        
        <div class="div-bio">
            <label for="bio-de">Biographie de l'artiste :</label>
            <textarea name="bio-de" id="bio-de" cols="40" rows="10"><?= $bioDe['description_artist']?></textarea>
        </div>
        <div class="div-artiste-bio">
            <p>Artiste concerné : <?= $artisteConc['Nom_Artiste'] . " " . $artisteConc['Prenom_Artiste']?></p>
        </div>

        <div class="submit-bio">
            <button name="submit-bio-de" type="submit">Valider la biographie</button>
        </div>
    </form>
</div>