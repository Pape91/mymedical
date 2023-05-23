<?php

/**
*	Controleur secondaire : monProfil
*/

// inclusion du fichier contenant les fonctions de base de données pour les utilisateurs
include_once RACINE . "/modele/bd.utilisateur.php";

use \mymedical\modele;

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

// inclusion du fichier de login
include_once RACINE . '/controleur/login.php';

// inclusion des fichiers pour l'authentification et les fonctions de base de données pour les utilisateurs
require_once RACINE . "/modele/bd.authentification.php";
require_once RACINE . "/modele/bd.utilisateur.php";

// récupération des données GET, POST, et SESSION
// création d'un objet connexion pour gérer l'authentification
$con = new \Mymedical\modele\Connexion();

// appel des fonctions permettant de récupérer les données utiles à l'affichage si l'utilisateur est connecté
if ($con->isLoggedOn()){
    $utilisateur = new \Mymedical\modele\Utilisateur();
    if(isset($_GET['id_declaration'])){
        $idDeclaration =  $_GET['id_declaration'];

        $utilisateur->deleteDeclaration($idDeclaration);
    }
    
    $utilisateur = new \Mymedical\modele\Utilisateur();
    $mailU = $con->getMailULoggedOn();
    $user = $utilisateur->getUtilisateurByMailU($mailU);
    $listDeclarations = $utilisateur->getListDeclarationPatient($user['Id_utilisateur']);
    $patient = $utilisateur->getPatientByIdUser($user['Id_utilisateur']);
    // appel du script de vue qui permet de gérer l'affichage des données du patient
    
    require RACINE . "/vues/vueEntete.php";
    require RACINE . "/vues/vuePatient.php";
    require RACINE . "/vues/vueFooter.php";
    
} else {
    // si l'utilisateur n'est pas connecté, on affiche seulement l'entête
    require RACINE . "/vues/vueEntete.php";
    require RACINE . '/vues/vueConnexion.php';
}

?>
