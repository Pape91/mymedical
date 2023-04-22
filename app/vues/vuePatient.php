
    <?php require RACINE . '/vues/vueEntete.php'; ?>
    <link rel="stylesheet" href="../../static/css/style.css">
    <main id="contenu" class="container">
        <h2 class="profil"> Profil Patient </h2>
        <div class="corps_patient">
            <div class="donnees">
                <h2> Informations personnelles </h2>
                <p> Prénom : <?php echo $user["prenom"]?></p>
                <p> Nom de famille : <?php echo $user["nom"]?></p>
                <p> Adresse mail : <?php echo $user["email"]?></p>
                <p> Mot de passe : ******</p>
                <p> Numéro de sécurité sociale : <?php echo $patient["numSecu"]?></p>
            </div>
            <div class="historique">
                <h2> Historique déclaration </h2>

                <?php if(isset($listDeclarations)){ 
                    
                    if( count($listDeclarations) === 0 ) echo '<span>Pas de déclaration</span>';

                    else{
                        ?>
                        <div class="accordion">
                        <?php    
                        for ($i = 0; $i < count(($listDeclarations)); $i++) { 
                            $res = $listDeclarations[$i];
                    ?>
                            
                            <div class="accordion-item">
                                <div class="accordion-header">Déclaration N°<?php echo $res['id_declaration']?></div>
                                <div class="accordion-content">
                                    <form>
                                        <?php if($res['est_traitee']) {?>
                                            <span class="traitee"> déclaration traitée
                                        <?php } else {?>
                                            <span class="non_traitee"> En cours de traitement  
                                       <?php }?>
                                        </span>

                                    <a href="?action=detailsDeclarationPatient&id_declaration=<?php echo $res['id_declaration']?>">Voir</a>
                                    <br><a href="?action=patient&id_declaration=<?php echo $res['id_declaration']?>"  onclick="return  confirm('Voulez-vous supprimer cette déclaration')"><i class="fas fa-trash fa-xs"></i></a>
                                    </form>
                                </div>
                            </div>

                       <?php } ?>
                       </div>
                    <?php } ?>
                
                <?php } ?>
            </div>
        </div>
    <div class="declaration">
        <h4>Déclarer mes symptômes</h4>
        <a href=".?action=declaration">Déclarer</a>
    </div>  
    </main>
    <script src="../../static/librairie/bootstrapp/js/accordeon.js"></script>

</body>
<?php //include('vues/vueFooter.php'); ?>
</html>
<?php //echo($user["nom"]) ;

//echo($user["prenom"]) ;?> 
    <?php //require ('vueFooter.php'); ?>

