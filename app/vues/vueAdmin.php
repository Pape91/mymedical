<?php require ('vueEntete.php'); ?>
    <link rel="stylesheet" href="../../static/css/style.css">
    <main id="contenu" class="container">
        <div class="corps_patient">
            <div class="donnees">
            <h2> Informations personnelles </h2>
                <p> Prénom : <?php echo $user["prenom"]?></p>
                <p> Nom de famille : <?php echo $user["nom"]?></p>
                <p> Adresse mail : <?php echo $user["email"]?></p>
                <p> Mot de passe : ******</p>
                <p> Numéro Professionnel : <?php echo $admin["numPro"]?></p>
            </div>
            <!-- <div class="historique">
                <h2> Historique déclaration </h2>
            </div> -->
        </div>
        <form action=".?action=ajoutSymptome" method="POST">
            <span>
                <?php
                        if(isset($message)){
                            echo($message);
                        }
                ?>
            </span>
            
            <div class="declaration">
                <h4>Ajouter de nouveaux symptômtes</h4>
                <input type="text"  name="symptome" required/>
                <button type="submit" >AJOUTER</button>
            </div>
        </form> 
    </main>

    <scrip>


    </scrip>
</body>
</html>