<?php

    /**
    *	Controleur secondaire : monProfil
    */

    // Inclusion du fichier contenant les fonctions pour manipuler la BD des utilisateurs
    include_once RACINE . "../modele/bd.utilisateur.inc.php";

    // Importation de l'espace de noms "modele" pour éviter des conflits de noms
    use \mymedical\modele;

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    // Inclusion du fichier contenant le formulaire de connexion
    include_once  'login.php';
    
    // Inclusion des fichiers contenant les fonctions pour gérer l'authentification et la BD des utilisateurs
    require_once RACINE . "/modele/authentification.php";
    require_once RACINE . "/modele/bd.utilisateur.inc.php";

    // Récupération des données GET, POST et SESSION

    $con = new \Mymedical\modele\Connexion();

    // Appel des fonctions pour récupérer les données utiles à l'affichage 
    if ($con->isLoggedOn()){
        // Récupération des informations de l'utilisateur connecté
        $utilisateur = new \Mymedical\modele\Utilisateur();
        $mailU = $con->getMailULoggedOn();
        $user = $utilisateur->getUtilisateurByMailU($mailU);

        // Récupération des déclarations non traitées
        $listDeclarations = $utilisateur->getAllDeclarationNonTraitees();

        // Récupération des informations du médecin
        $medecin = $utilisateur->getMedecinByIdUser($user['Id_utilisateur']);

        // Inclusion des fichiers de la vue pour l'entête, le contenu du profil et le pied de page
        require ('app/vues/vueEntete.php');
        require ('app/vues/vueMedecin.php');
        require ('app/vues/vueFooter.php');
        
    } else {
        // Si l'utilisateur n'est pas connecté, affichage de la page d'accueil
        require ('app/vues/vueEntete.php');
        require ('app/vues/vueHome.php');
        require ('app/vues/vueEntete.php');
    }

?>
