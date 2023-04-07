<?php

/**
*	Controleur secondaire : monProfil
*/

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

require_once RACINE . "/modele/authentification.php";
require_once RACINE . "/modele/bd.utilisateur.inc.php";

// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
if (isLoggedOn()){
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByMailU($email);
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Mon profil";
    include RACINE . "/vue/entete.html.php";
    include RACINE . "/vue/vuePatient.php";
    
} else {
    $titre = "Mon profil";
    include RACINE . "/vue/entete.html.php";
    
}

?>