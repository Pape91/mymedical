
    <?php require ('entete.php'); ?>
    <link rel="stylesheet" href="../../static/css/style.css">
    <main id="contenu" class="container">
        <div class="corps_patient">
            <div class="donnees">
                <h2> Informations personnelles </h2>
                <p> Prénom <?php echo($user["prenom"]) ?></p>
                <p> Nom de famille : <?php echo($user["nom"]) ?></p>
                <p> Adresse mail </p>
                <p> Mot de passe</p>
                <p> Numéro de sécurité sociale</p>
            </div>
            <div class="historique">
                <h2> Historique déclaration </h2>
                <p> Prénom  <span>Prénom</span></p>
                <p> Nom de famille <span>Nom de famille</span></p>
                <p> Adresse mail <span>Adresse mail</span></p>
                <p> Mot de passe <span>*******************</span></p>
                <p> Numéro de sécurité sociale <span>Numéro sécurité sociale</span></p>
            </div>
        </div>
    <div class="declaration">
        <h4>Déclarer mes symptômes</h4>
        <a href=".?action=declaration">Déclarer</a>
    </div>  
    </main>
</body>
</html>