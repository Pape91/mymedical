<?php require ('vueEntete.php'); ?>
    <link rel="stylesheet" href="../../static/css/style.css">
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

    <script>
        var accordions = document.getElementsByClassName("accordion-header");
        for (var i = 0; i < accordions.length; i++) {
        accordions[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
            content.style.maxHeight = null;
            } else {
            content.style.maxHeight = content.scrollHeight + "px";
            }
            // Ajouter cette condition pour désactiver les autres sections actives
            var activeAccordion = document.querySelector(".accordion-header.active");
            if (activeAccordion && activeAccordion !== this) {
            activeAccordion.classList.remove("active");
            activeAccordion.nextElementSibling.style.maxHeight = null;
            }
        });
        }

      </script>
</body>
</html>