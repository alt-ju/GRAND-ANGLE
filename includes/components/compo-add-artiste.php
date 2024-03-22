
<div class="artiste-infos">
    <div class="title-add-artiste">
        <h2>Ajouter les informations d'un nouvel artiste :</h2> 
    </div>
    
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="img-container-add-artiste">
            <div class="img-content-add-artiste">
                <img id="preview-img-artiste" src="./assets/img/imgvide.webp" alt="">  
            </div>
            <div class="input-photo-artiste">
                <label for="photo-artiste">Photo de l'artiste :</label>
                <input type="file" id="photo-artiste" name="photo-artiste" accept="image/*">
            </div>
        </div>

        <div>
            <div class="main-info-add-artiste">

                <div class="div-nom-artiste">
                    <label for="nom-artiste">Nom :</label>
                    <input type="text" id="nom-artiste" name="nom-artiste">
                </div>
                <div class="div-prenom-artiste">
                    <label for="prenom-artiste">Prénom :</label>
                    <input type="text" id="prenom-artiste" name="prenom-artiste">
                </div>

            </div>

            <div class="sub-infos-add-artiste">

                <div class="div-email-artiste">
                    <label for="email-artiste">Email :</label>
                    <input type="email" id="email-artiste" name="email-artiste">
                </div>
                
                <div class="div-tel-artiste">
                    <label for="tel-artiste">Téléphone :</label>
                    <input type="text" id="tel-artiste" name="tel-artiste">
                </div>

                <div class="div-dir-artiste">
                    <select name="dir-artiste" id="dir-artiste">
                        <option value=""></option>
                    </select>
                </div>
            
            </div>
            <div class="div-btn-add-artiste">
                <button type="submit">Créer la fiche artiste</button>
            </div>
        </div>

    </form>
</div>