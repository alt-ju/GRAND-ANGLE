
<div class="en">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="img-container-add-artiste">
            <div class="img-content-add-artiste">
                <img id="preview-img-artiste-en" src="./img-artiste/<?= $bioEn['chemin_ImgArt']?>" alt="">
                <img id="preview-en" src="" alt="">  
            </div>
            <div class="input-photo-artiste">
                <?php $imgUrl = !empty($bioEn['chemin_ImgArt']) && file_exists($bioEn['chemin_ImgArt']) ? $bioEn['chemin_ImgArt'] : "./assets/img/imgvide.webp";?>
                
                <label for="photo-artiste">Photo de l'artiste :</label>
                <input type="file" id="photo-artiste-en" name="photo-artiste-en" accept="image/*">
                <img src="" alt="">
            </div>
        </div>
        
        <div class="div-bio">
            <label for="bio-en">Biographie de l'artiste :</label>
            <textarea name="bio-en" id="bio-en" cols="40" rows="10"><?= $bioEn['description_artist']?></textarea>
        </div>
        <div class="div-artiste-bio">
            <p>Artiste concerné : <?= $artisteConc['Nom_Artiste'] . " " . $artisteConc['Prenom_Artiste']?></p>
        </div>

        <div class="submit-bio">
            <button name="submit-bio-en" type="submit">Valider la biographie</button>
        </div>
    </form>
</div>