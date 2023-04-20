
<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

?>
<main id="contenu" class="container">
    <div class="bloc">
            <div class="image1"><img src="static/images/Capt.JPG" alt=""></div>
            <div class="formulaire">
            <span>
                <?php
                    if(isset($formulaireOk)){
                        if(!$formulaireOk)
                            echo("Problème de connexion");
                    }
                    else if(isset($message)){
                        echo($message);
                    }
                 ?>
            </span>
            <h3>Vous n'êtes pas encore inscrit?</h3>
            <a href="./?action=pre_inscription">créer un espace utilisateur</a>
                <form action="./?action=connexion" method="POST">
                    
                    <label for="email" >E-mail :</label>
                    <input type="email" id="email" name="email" required>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit">Connexion</button>
                    <label for="text"><a href="#">Mot de passe oublié?</a></label>
                </form>
            </div> 
    </div>
</main>
<?php //require ('vueFooter.php'); ?>

