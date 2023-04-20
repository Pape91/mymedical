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

include_once  ('login.php');

require_once RACINE . "/modele/authentification.php";
require_once RACINE . "/modele/bd.utilisateur.inc.php";

// recuperation des donnees GET, POST, et SESSION

$con = new \Mymedical\modele\Connexion();
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
if ($con->isLoggedOn()){
    $utilisateur = new \Mymedical\modele\Utilisateur();
    $mailU = $con->getMailULoggedOn();
    $user = $utilisateur->getUtilisateurByMailU($mailU);
    $listDeclarations = $utilisateur->getListDeclarationPatient($user['Id_utilisateur']);
    $patient = $utilisateur->getPatientByIdUser($user['Id_utilisateur']);
    // appel du script de vue qui permet de gerer l'affichage des donnees
    // include RACINE . "../vues/entete.php";
    include RACINE . "../vues/vuePatient.php";
    require ('app/vues/vueFooter.php');
    
} else {
    $titre = "Mon profil";
    include RACINE . "../vues/vueEntete.php";
}

?>
