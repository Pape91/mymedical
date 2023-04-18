

<?php

    $dateDeclaration = $declaration[0]["date_declaration"];
    $dateReponse = $declaration[0]["date_reponse"];
    $reponse = $declaration[0]["reponse_declaration"];
    $autre = $declaration[0]["autres"];

    echo '<div id="date">Date de déclaration : '.$dateDeclaration.'</div>';
?>
    <div id="titre">Le patient a déclaré avoir les symptômes suivants : </div>
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
    echo '</ul>'
?>

<div><a href="?action=patient"> Retour à la page profil</a></div>