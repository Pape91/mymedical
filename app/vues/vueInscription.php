    
    <main id="contenu" class="container">
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
              <input type="email" id="email" name="email" required>
              <label for="password">Mot de passe :</label>
              <input type="password" id="password" name="mot_de_passe" required>
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
              <option value="" disabled>Choisissez une option</option>
              <option value="patient" selected>Patient</option>
              <option value="medecin">Medecin</option>
              <option value="admin">Admin</option>
            </select>
              <label id="libelle_role">numéro sécurité sociale</label>
              <input type="text" id="numero_role" name="num" inputmode="numeric" pattern="\d*" required>
            <button type="submit">S'inscrire</button>
        </form>
      </div>
    </main>
