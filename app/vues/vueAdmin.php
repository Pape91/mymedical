<?php //require ('vueEntete.php'); ?>
    <main id="contenu" class="container">
        <h2 class="profil">Profil Admin</h2>
        <div class="corps_patient">
            <div class="donnees">
            <h2> Informations personnelles </h2>
                <p> Prénom : <?php echo $user["prenom"]?></p>
                <p> Nom de famille : <?php echo $user["nom"]?></p>
                <p> Adresse mail : <?php echo $user["email"]?></p>
                <p> Mot de passe : ******</p>
                <p> Numéro Professionnel : <?php echo $admin["numPro"]?></p>
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

                                        <div class="autre_symptom">Autres symptomes déclarés :<span><?php echo $res['autres']?></span></div>

                                    </form>
                                </div>
                            </div>

                       <?php } ?>
                       </div>
                    <?php } ?>
                
                <?php } ?>
            </div>
        <form action=".?action=admin" method="POST">
            <span>
                <?php
                        if(isset($message)){
                            echo($message);
                        }
                ?>
            </span>
        </div>
            
            <div class="declaration">
                <h4>Ajouter de nouveaux symptômtes</h4>
                <input type="text"  name="symptome" required/>
                <button type="submit" >AJOUTER</button>
            </div>
        </form> 
    </main>
</body>
</html>