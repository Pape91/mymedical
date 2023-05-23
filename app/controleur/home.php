<?php

    /**
    *   Controleur secondaire : connexion 
    */

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    // inclusion des fichiers nécessaires
    require_once RACINE . "/modele/bd.authentification.php";
    include_once RACINE . "/modele/bd.utilisateur.php";
    include_once RACINE . "/modele/bd.patient.php";
    include_once RACINE . "/modele/bd.medecin.php";
    include_once RACINE . "/modele/bd.admin.php";

    // initialisation des objets nécessaires
    $aut = new \Mymedical\modele\Connexion();
    $utilisateur = new \Mymedical\modele\Utilisateur();
    

    if(isset($_GET['type'])){

        $typeUser = $_GET['type'];
        $titre = "authentification";

        require RACINE . "/vues/vueEntete.php";
        require RACINE . "/vues/vueConnexion.php";
        require RACINE . "/vues/vueFooter.php";
    }
    else{
        require RACINE . "/vues/vueEntete.php";
        require RACINE . "/vues/vueAccueil.php";
        require RACINE . "/vues/vueFooter.php";


    }
    


?>
