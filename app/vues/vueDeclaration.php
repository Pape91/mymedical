

<h1>Déclaration de symptômes</h1>

<form>
    <div id="symtomes">
        <?php
            if( count($listSymptomes) === 0 ) echo "<span>Aucun restaurant trouvé.</span>";

            for ($i = 0; $i < count(($listSymptomes)); $i++) { ?>

                <div>
                <?php $res = $listSymptomes[$i];?>
                <span>
                    <?php echo $res["nom_symptome"]?>: 
                    Oui <input type="radio" name="yes_no" value="oui" required>
                    Non <input type="radio" value="oui" name="yes_no" required>
                </span>

                </div>
            <?php }?>
       
    </div>

    <div id="autre_symptome">
            <p>Autes Symptomes</p>
            <textarea id="texte_autre">

            </textarea>
    </div>
    <button type="submit">Envoyer</button>
</form>
