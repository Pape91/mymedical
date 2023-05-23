<?php

    include_once RACINE . "/modele/bd.ajoutSymptome.php";

    use \Mymedical\modele;

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        // Vérifie si le script courant est bien le contrôleur principal, sinon affiche une erreur
        die('Erreur : '.basename(__FILE__));
    }

    include_once RACINE .  '/controleur/login.php';
    
    require_once RACINE . "/modele/bd.authentification.php";
    require_once RACINE . "/modele/bd.declaration.php";

    $objDeclaration = new \Mymedical\modele\Declaration();

    $objSymptome = new \Mymedical\modele\Symptome();
    $listSymptomes = $objSymptome->getSymptomes();

    // Récupère l'identifiant de la déclaration depuis la requête GET
    $idDeclaration =  $_GET['id_declaration'];

    // Variables pour déterminer le rôle de l'utilisateur (médecin, administrateur, etc.)
    $idMedecin='';
    $estMedecin;
    $estAdmin;

    // Si l'utilisateur est un médecin
    if( isset($_GET['estMedecin']) && $_GET['estMedecin']=="oui"){
        $estMedecin = true;
        $idMedecin = $_GET['id_medecin'];
    }
    // Si l'utilisateur est un administrateur
    else if( isset($_GET['estAdmin']) && $_GET['estAdmin']=="oui"){
        $estAdmin = true;
    }
    
    // Récupère les détails de la déclaration depuis la base de données
    $utilisateur = new \Mymedical\modele\Utilisateur();

    $declaration = $utilisateur->getDeclarationDetails($idDeclaration);

    // Inclut les vues pour l'en-tête et les détails de la déclaration
    require RACINE . '/vues/vueEntete.php';
    require RACINE . '/vues/vueDetailsDeclaration.php';
?>
