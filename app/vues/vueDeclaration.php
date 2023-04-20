
<main id="contenu" class="container">
    
    <div class="titre_declaration">
        <h1>Déclaration de symptômes</h1>
    </div>
    <form class="form-declaration" action=".?action=declaration" method="POST">
        <div id="symtomes">
        <?php

            if(isset($message)){?>
                <span><?php echo $message ?></span>
            <?php }

            if( count($listSymptomes) === 0 );

            else 
                for ($i = 0; $i < count(($listSymptomes)); $i++) { ?>

                <div class="question">
                <?php $res = $listSymptomes[$i];?>
                <span>
                    <?php echo $res["nom_symptome"]?> : 
                    Oui <input type="radio" name="yesno_<?php echo $res["Id_symptome"]?>" value="oui" required>
                    Non <input type="radio" value="non" name="yesno_<?php echo $res["Id_symptome"]?>" required>
                </span>

                </div>
        <?php }?> 
    </div>

    <div id="autre_symptome">
        <p>Autes Symptomes</p>
        <textarea id="texte_autre" name="autre">
            
            </textarea>
        </div>
        <button type="submit">Envoyer</button>
    </form>
    <span>
        <div class="retour_profil"><a href=".?action=patient">retour à la page profil</a></div>
    </span>
</main>
