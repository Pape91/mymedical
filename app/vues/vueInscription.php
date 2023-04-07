<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>inscription</title>
  </head>
  <body>
    <header id="bandeau" class="container">
      <div class="titre">
        <h1>My medical</h1>
      </div>
    </header> -->
    <?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
  // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

?>
    <?php require ('entete.php'); ?>
    
    <main id="contenu" class="container">
      <link rel="stylesheet" href="../../static/css/style.css">
      <div class="formulaire">
       
        <form class="form-inscription" action="./?action=inscription" method="POST">
            <h3>Mes informations personelles</h3>
              <span id="alerte">
                <?php if (isset($msg))
                      $msg
                ?>
              </span>
              <label for="prenom">Prénom</label>
              <input type="text" id="prenom" name="prenom" required>
              <label for="nom">Nom</label>
              <input type="text" id="nom" name="nom" required>
              <label for="email" >E-mail :</label>
              <input type="email" id="email" name="email">
              <label for="password">Mot de passe :</label>
              <input type="password" id="password" name="mot_de_passe">
              <label for="naissance">Date de naissance :</label>
              <input type="date" id="naissance" name="date_de_naissance" required>
            <label>Genre</label>
              <div>
                <label for="homme">Homme</label>
                <input type="radio" id="homme" name="genre" value="homme" required>
                <label for="femme">Femme</label>
                <input type="radio" id="femme" name="genre" value="femme">

              </div>
            
            <label for="role">Rôle</label>
            <select id="role" name="role" required>
              <option value="patient" selected>Patient</option>
              <option value="medecin">Medecin ou admin</option>
            </select>
              <span id="libelle_role">numéro sécurité sociale</span>
              <input type="text" id="numero_role" name="role" required>
            <button type="submit">S'inscrire</button>
          </form>
    </main>

    <script>
      
      function getRole(){
        document.getElementById("role").addEventListener("change", (event) => {

          var role = document.getElementById("role").value;
          if(role=="patient"){
            document.getElementById("libelle_role").innerHTML="numéro sécurité sociale";
          }
           
          else
            document.getElementById("libelle_role").innerHTML="numéro professionnel";
        });
      }

      getRole();

    </script>
