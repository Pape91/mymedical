<?php

    /**
    *	Controleur secondaire : monProfil
    */

    include_once RACINE . "../modele/bd.utilisateur.inc.php";

    use \mymedical\modele;

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    include_once  'login.php';
    
    require_once RACINE . "/modele/authentification.php";
    require_once RACINE . "/modele/bd.utilisateur.inc.php";

    // recuperation des donnees GET, POST, et SESSION

    $con = new \Mymedical\modele\Connexion();
    // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
    if ($con->isLoggedOn()){
        $utilisateur = new \Mymedical\modele\Utilisateur();
        $mailU = $con->getMailULoggedOn();
        $user = $utilisateur->getUtilisateurByMailU($mailU);
        $listDeclarations = $utilisateur->getAllDeclarationNonTraitees();
        $medecin = $utilisateur->getMedecinByIdUser($user['Id_utilisateur']);

        $titre = "Mon profil";
        require ('app/vues/vueEntete.php');
        require ('app/vues/vueMedecin.php');
        require ('app/vues/vueFooter.php');
        
    } else {

        $titre = "Mon profil";
        require ('app/vues/vueEntete.php');
        require ('app/vues/vueHome.php');
        require ('app/vues/vueEntete.php');
    }

?>
