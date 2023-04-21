

<?php

    include_once RACINE . "../modele/bd.ajoutSymptome.php";

    use \Mymedical\modele;

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    include_once  'login.php';
    
    include_once __DIR__ . "/config.php";

    require_once RACINE . "/modele/authentification.php";
    require_once RACINE . "/modele/bd.declaration.php";

    $objDeclaration = new \Mymedical\modele\Declaration();

    $objSymptome = new \Mymedical\modele\Symptome();
    $listSymptomes = $objSymptome->getSymptomes();


    $idDeclaration =  $_GET['id_declaration'];
    $idMedecin='';
    $estMedecin;
    $estAdmin;

    if( isset($_GET['estMedecin']) && $_GET['estMedecin']=="oui"){
        $estMedecin = true;
        $idMedecin = $_GET['id_medecin'];
    }
    else if( isset($_GET['estAdmin']) && $_GET['estAdmin']=="oui"){
        $estAdmin = true;
    }
        

    $utilisateur = new \Mymedical\modele\Utilisateur();
    $declaration = $utilisateur->getDeclarationDetails($idDeclaration);

    require ('app/vues/vueEntete.php');
    require ('app/vues/vueDetailsDeclaration.php');
?>