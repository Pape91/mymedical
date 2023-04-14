
<div class="titre_declaration">
    <h1>Déclaration de symptômes</h1>
</div>

<form>
    <div id="symptomes">
        <?php
            if( count($listSymptomes) === 0 ) echo "<span></span>";

            for ($i = 0; $i < count(($listSymptomes)); $i++) { ?>

                <div>
                <?php $res = $listSymptomes[$i];?>
                <span>
                    <?php echo $res["nom_symptome"]?>: 
                    Oui <input type="radio" name="yes" value="oui" required>
                    Non <input type="radio" value="oui" name="no" required>
                </span>

                </div>
            <?php }?>
       
    </div>

    <div id="autre_symptome">
            <h4>Autes Symptomes</h4>
            <textarea id="texte_autre">

            </textarea>
    </div>
    <button type="submit">Envoyer</button>
</form>
