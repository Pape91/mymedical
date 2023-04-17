
    <main id="contenu" class="container">
        <div class="corps_patient">
            <div class="donnees">
                <h2> Informations personnelles </h2>
                <p> Prénom <?php //echo($user["prenom"]) ?></p>
                <p> Nom de famille : <?php //echo($user["nom"]) ?></p>
                <p> Adresse mail </p>
                <p> Mot de passe</p>
                <p> Numéro professionnel</p>
            </div>
            <div class="historique">
                <h2> Historique déclaration </h2>
                    <div class="accordion">
                        <div class="accordion-item">
                        <div class="accordion-header">Déclaration 1</div>
                        <div class="accordion-content">
                            <form>
                            <p></p>
                            <a href="#">Traiter</a>
                            </form>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <div class="accordion-header">Déclaration 2</div>
                        <div class="accordion-content">
                            <form>
                            <p></p>
                            <a href="#">Traiter</a>
                            </form>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    <!-- <div class="declaration">
        <h4>Déclarer mes symptômes</h4>
        <a href=".?action=declaration">Déclarer</a>
    </div>   -->
    </main>

    <script src="../../static/librairie/bootstrapp/js/accordeon.js"></script>
</body>
</html>