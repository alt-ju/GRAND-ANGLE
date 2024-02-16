<?php

$title = "Connexion";

include "includes/pages/header.php";

;?>


<h1 class="bienvenu">Bienvenue</h1>
 
  <form class="form-login" method="POST" action="">
          <div class="from-divs">
            <label for="email" >Email :</label>
          </div>
          <div class="from-divs">
          <input type="email"  id="email" class="field-login"  name="email" placeholder="email@example.com">
          <div class="red"></div>
          </div>
          <div class="from-divs">
              <label for="pass" >Mot de Passe :</label>
          </div>
          <div class="from-divs">
              <input type="password"  class="field-login" id="pass"  name="pass">
          </div>
          <div class="from-divs login-input" >
            <input type="submit" class="input-sub-login" value="Confirm identity">
          </div>
          <div class="red"></div>
  </form>