<main id="contenu" class="container">
<div id="details">
    <h2>Détails Déclaration</h2>
<?php

    $dateDeclaration = $declaration[0]["date_declaration"];
    $dateReponse = $declaration[0]["date_reponse"];
    $reponse = $declaration[0]["reponse_declaration"];
    $autre = $declaration[0]["autres"];

    $statut = 'en cours';
    if($declaration[0]["est_traitee"])
        $statut = 'traité';

    $titre = ' Le patient a déclaré avoir les symptômes suivants';
    $action = 'medecin';

    if(isset($estMedecin) && !$estMedecin){
        $titre = ' Vous avez déclaré avoir les symptômes suivants';
        $action = 'patient';
    }
        

    echo '<div id="date">Date de déclaration : '.$dateDeclaration.'</div>';
    echo '<div id="statut">Etat de la déclaration : '.$statut .'</div>';
?>
    <fieldset id="bloc_symtome">
    <legend id="titre"> <?php echo $titre ?> </legend>
    <div class="symtomes">
        <ul id="symtomes">
<?php

    foreach($declaration as $ligne){ ?>
        <li>
    <?php 
        echo $ligne['nom_symptome'] ?> 
        </li>
    <?php  } 
    if(!empty($autre))
        echo '<li>Autres symptômes : '.$autre.'</li>';
    echo '</ul>';
    echo '</div>';
    echo '</fieldset>';

    if(isset($estMedecin) && $estMedecin){ ?>
        
        <form id="reponse" action=".?action=reponseDeclaration&id_declaration=<?php echo $idDeclaration ?>&id_medecin=<?php echo $idMedecin ?>" method="POST">

            <textarea id="texte_reponse" name="reponse" required></textarea>

            <button type="submit">Répondre</button>

        </form>

   <?php }
   else{

        if($declaration[0]["est_traitee"])
            echo '<div id=reponse_medecin"><span>Réponse du medecin : </span>'.$declaration[0]["reponse_declaration"].'</div>';
   }

?>

    <div class="retour_profil"><a href="?action=<?php echo $action ?>"> Retour à la page profil</a></div>

</div>
</main>