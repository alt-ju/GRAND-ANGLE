<?php

$title = "Liste des expositions";

$sql = "SELECT exposition.*, theme_exposition.*  
        FROM exposition  
        LEFT JOIN theme_exposition ON exposition.id_Theme = theme_exposition.id_Theme
        ORDER BY exposition.Date_Debut ASC";
$requete = $db -> query($sql);
$expositions = $requete->fetchAll(PDO::FETCH_ASSOC);
$db = null;

;?>

<div class="tab-expo-contain">

<div class="page-exposition">
    <h2 class="title-page-expo">Liste des Expositions</h2>
  
    <div class="search-container-expo form-divs-list-expo">
        <div class="search-bar-div">
            <button type="submit" class="search-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></button>
            <input type="search" class="search-bar">
        </div>
      <div class="container-button-art-ongoing">
        <button type="button" id="add-oeuvre-expo-now">Ajouter une exposition<svg viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></button>
    </div>   
    </div>
    <div class="table-expo">
      <table class="list-expo" >
        <thead>
          <tr class="first-row">
            <th>Id</th>
            <th>Libelle</th>
            <th>Thème</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Modifier</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($expositions as $expo) : ?>
          <tr>
            <td><?php echo $expo['Id_Exposition'];?></td>
            <td><?php echo $expo['libelle_Exposition'];?></td>
            <td><?php echo $expo['libelle_Theme'];?></td>
            <td><?php echo $expo['Date_Debut'];?></td>
            <td><?php echo $expo['Date_Fin'];?>
            </td>
            <td class="svg-expo">
                <div class="div-icon-expo">
                    <a href="#" class="ctr-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg></a>
                </div>
                <div class="div-icon-expo"> 
                    <a href="#" class="ctr-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>
                </div>
            </td>
          </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
    </div>
  </div>

</div>