
    <?php require ('vueEntete.php'); ?>
    <link rel="stylesheet" href="../../static/css/style.css">
    <main id="contenu" class="container">
        <div class="corps_patient">
            <div class="donnees">
                <h2> Informations personnelles </h2>
                <p> Prénom </p>
                <p> Nom de famille :</p>
                <p> Adresse mail </p>
                <p> Mot de passe</p>
                <p> Numéro de sécurité sociale</p>
            </div>
            <div class="historique">
                <h2> Historique déclaration </h2>

                <?php if(isset($listDeclarations)){ 
                    
                    if( count($listDeclarations) === 0 ) echo '<span>Pas de déclaration</span>';

                    else{

                        for ($i = 0; $i < count(($listDeclarations)); $i++) { 
                            $res = $listDeclarations[$i];
                    ?>
                            <div class="accordion">
                            <div class="accordion-item">
                                <div class="accordion-header">Déclaration N°<?php $res['id_declaration']?></div>
                                <div class="accordion-content">
                                    <form>
                                        <?php if($res['est_traitee']) {?>
                                            <span class="traitee"> déclaration traitée
                                        <?php } else {?>
                                            <span class="non_traitee"> En cours de traitement  
                                       <?php }?>
                                        </span>

                                    <a href="?action=detailsDeclarationPantient&id_declatation=<?php $res['id_declaration']?>">Voir</a>
                                    </form>
                                </div>
                            </div>

                       <?php } ?>
                    <?php } ?>
                
                <?php } ?>

            </div>
        </div>
    <div class="declaration">
        <h4>Déclarer mes symptômes</h4>
        <a href=".?action=declaration">Déclarer</a>
    </div>  
    </main>
    <script src="/../static/librairie/bootstrapp/js/accordeon.js"></script>

</body>
</html>
<?php //echo($user["nom"]) ;

//echo($user["prenom"]) ;?> 
    <?php //require ('vueFooter.php'); ?>

