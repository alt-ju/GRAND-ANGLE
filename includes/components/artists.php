

<div class="page-artist">
    <h2 class="title-page-artist">Liste des Artistes</h2>
    <div class="btn-dirart">
        <button><a href="./list-dirart.php">Liste des directeurs artistiques</a></button>
    </div>
    
    <div class="search-container form-divs-list-artist">
        <div class="search-bar-contain">
             <button type="submit" class="search-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></button>           
            <input type="search" class="search-bar">
            <div class="container-button-art-ongoing">
              <button type="button" class="expo-spe" id="add-oeuvre-expo-now">Ajouter un artiste<svg viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></button>
            </div>  
        </div>
    </div>

    <div class="table-artiste">
      <table class="list-artiste" >
        <thead>
          <tr class="first-row">
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Directeur artistique</th>
            <th>Modifier</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($artists as $artist) : ?>
          <tr>
            <td><?php echo $artist['Id_Artiste'];?></td>
            <td><?php echo $artist['Nom_Artiste'];?></td>
            <td><?php echo $artist['Prenom_Artiste'];?></td>
            <td><?php echo $artist['tel_Artiste'];?></td>
            <td><?php echo $artist['Email_Artiste'];?></td>
            <td><?php echo $artist['nom_DirArt'];?></td>
            <td>
              <a href="#" class="ctr-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg></a>
              <a href="#" class="ctr-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
