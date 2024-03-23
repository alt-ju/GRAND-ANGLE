<div class="en">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="img-container-add-artiste">
            <div class="img-content-add-artiste">
                <img id="preview-img-artiste-en" src="./assets/img/imgvide.webp" alt="">  
            </div>
            <div class="input-photo-artiste">
                <label for="photo-artiste">Photo de l'artiste :</label>
                <input type="file" id="photo-artiste" name="photo-artiste" accept="image/*">
            </div>
        </div>
        
        <div class="div-bio">
            <label for="bio-en">Biographie de l'artiste :</label>
            <textarea name="bio-en" id="bio-en" cols="40" rows="10"></textarea>
        </div>
        <div class="div-artiste-bio">
        <p>Artiste concerné :</p>
        </div>

        <div class="submit-bio">
            <button type="submit">Valider la biographie</button>
        </div>
    </form>
</div>