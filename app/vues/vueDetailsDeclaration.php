<main id="contenu" class="container">
<div id="details">
    <h2>Détails Déclaration</h2>
<?php

    $dateDeclaration = $declaration[0]["date_declaration"];
    $dateReponse = $declaration[0]["date_reponse"];
    $reponse = $declaration[0]["reponse_declaration"];
    $nomPatient = $declaration[0]["nom"];
    $prenomPatient = $declaration[0]["prenom"];
    $autre = $declaration[0]["autres"];

    $nomMedecin;
    $prenomMedecin;



    $statut = 'en cours';
    if($declaration[0]["est_traitee"])
        $statut = 'traité';

    
    $titre = ' Vous avez déclaré avoir les symptômes suivants';
    $action = 'patient';

    if(isset($estAdmin)){
        $action = 'admin';
    }
    else if(isset($estMedecin)){
        $titre = ' Le patient a déclaré avoir les symptômes suivants';
        $action = 'medecin';
        echo '<div id="nom_prenom">Patient <b>: '.$prenomPatient.' '.$nomPatient.'</b></div>';
    }else{
        
        if(isset($declaration[0]['nomMedecin']) && isset($declaration[0]['prenomMedecin'])){

            $nomMedecin=$declaration[0]['nomMedecin'];
            $prenomMedecin=$declaration[0]['prenomMedecin'];
            echo '<div id="nom_prenom_medecin">Traité par le medecin  <b>'.$prenomMedecin.' '.$nomMedecin.'</b></div>';

        }
       
    }
 
    echo '<div id="date">Date de déclaration <b>: '.$dateDeclaration.'</b></div>';
    echo '<div id="statut">Etat de la déclaration : <b>'.$statut .'</b></div>';
?>
    <fieldset id="bloc_symtome">
    <legend id="titre"> <?php echo $titre ?> </legend>
    <div class="symtomes">
        <ul id="symtomes">
<?php

    foreach($declaration as $ligne){ ?>
        <li>
    <?php 
        echo '<b>'.$ligne['nom_symptome'] .'</b>'?> 
        </li>
    <?php  } 
    if(!empty($autre))
        echo '<li>Autres symptômes : <b>'.$autre.'</b></li>';
    echo '</ul>';
    echo '</div>';
    echo '</fieldset>';

    if(isset($estMedecin) && $estMedecin){ ?>
        
        <form id="reponse" action=".?action=reponseDeclaration&id_declaration=<?php echo $idDeclaration ?>&id_medecin=<?php echo $idMedecin ?>" method="POST">
        <span class="reponse">Répondre au patient :</span>
            <textarea id="texte_reponse" name="reponse" required></textarea>

            <button type="submit">Répondre</button>

        </form>

   <?php }
   else{

        if($declaration[0]["est_traitee"])
            echo '<div id=reponse_medecin"><span>Réponse du medecin : <b> </span>'.$declaration[0]["reponse_declaration"].'</b></div>';
   }

?>

    <div class="retour_profil"><a href="?action=<?php echo $action ?>"> Retour à la page profil</a></div>

</div>
</main>