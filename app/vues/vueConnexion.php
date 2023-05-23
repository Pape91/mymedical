
<main id="contenu" class="container">
    <div class="bloc">
            <div class="formulaire">
            <span class="msg">
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
            <h3>Se connecter en tant que</h3>
            <span><h3> <?php echo($typeUser) ?></h3> </span>
                <form action="./?action=connexion&typeUser=<?php echo($typeUser) ?>" method="POST">  
                    <label for="email" >E-mail :</label>
                    <input type="email" id="email" name="email" required>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit">Connexion</button>
                    <label><a href="#">Mot de passe oublié?</a></label>
                </form>
            </div> 
    </div>
</main>
