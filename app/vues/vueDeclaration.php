

<div class="titre_declaration">
    <h1>Déclaration de symptômes</h1>
</div>

<span>
    <a href=".?action=patient">retour à la page profil =></a>
</span>
<form class="form-declaration" action=".?action=declaration" method="POST">
    <div id="symtomes">
        <?php

            if(isset($message)){?>

                <span><?php $message ?></span>
        <?php }

            if( count($listSymptomes) === 0 );

            else 
                for ($i = 0; $i < count(($listSymptomes)); $i++) { ?>

                <div>
                <?php $res = $listSymptomes[$i];?>
                <span>
                    <?php echo $res["nom_symptome"]?>: 
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
