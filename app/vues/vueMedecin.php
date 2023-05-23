
    <main id="contenu" class="container">
    <h2 class="profil"> Profil Medecin </h2>
        <div class="corps_patient">
            <div class="donnees">
                <h2> Informations personnelles </h2>
                <p> Prénom : <?php echo $user["prenom"]?></p>
                <p> Nom de famille : <?php echo $user["nom"]?></p>
                <p> Adresse mail : <?php echo $user["email"]?></p>
                <p> Mot de passe : ******</p>
                <p> Numéro Professionnel : <?php echo $medecin["numPro"]?></p>
            </div>
            <?php if(isset($message)) echo '<span class="message">'.$message.'</span>' ?>
            <div class="historique">
                <h2> Déclarations en attentes </h2>

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
                                        <a href="?action=detailsDeclarationPatient&estMedecin=oui&id_declaration=<?php echo $res['id_declaration']?>&id_medecin=<?php echo $medecin['Id_utilisateur']?>">Traiter</a>
                                    </form>
                                </div>
                            

                       <?php } ?>
                       </div>
                    <?php } ?>
                
                <?php } ?>

            </div>
        </div>
    </main>
</body>

