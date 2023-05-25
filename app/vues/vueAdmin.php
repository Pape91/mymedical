    <main id="contenu" class="container">
        <h2 class="profil">Vous agissez en tant que Gestionnaire</h2>
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
                <h2> Symptômes à rajouter </h2>

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
                                            </span>
                                            <span class="non_traitee"> En cours de traitement  
                                       <?php }?>
                                            </span>

                                        <div class="autre_symptom">Autres symptômes déclarés :<span><?php echo $res['autres']?></span></div>

                                    </form>
                                </div>
                            </div>

                       <?php } ?>
                       </div>
                    <?php } ?>
                
                <?php } ?>
            </div>
        </div>
        <form action=".?action=admin" method="POST">
            <span class="symptome">
                <?php
                        if(isset($message)){
                            echo($message);
                        }
                ?>
            </span>
            
            <div class="declaration">
                <h4>Ajouter de nouveaux symptômes</h4>
                <input type="text"  name="symptome" required/>
                <button type="submit" >AJOUTER</button>
            </div>
        </form> 
    </main>
