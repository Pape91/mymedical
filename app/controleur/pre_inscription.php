<?php

/**
*	Controleur secondaire : inscription 
*/

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}
include_once RACINE . "/modele/bd.utilisateur.inc.php";


$inscrit = false;
$msg="My Medical";

// recuperation des donnees GET, POST, et SESSION (vérification à confier au front)

if (isset($_POST["email"]) && isset($_POST["mot_de_passe"]) && isset($_POST["role"]) && isset($_POST["genre"])
    && isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["date_de_naissance"]) && (isset($_POST["numSecu"])
    || isset($_POST["numPro"]))) {

    if ($_POST["email"] != "" && $_POST["mot_de_passe"] != "" && $_POST["role"] != "" && $_POST["genre"] != "" 
        && $_POST["prenom"] != "" && $_POST["nom"] != "" && $_POST["date_de_naissance"] != "" && ($_POST["numSecu"] != "" 
        || $_POST["numPro"] != "")) {

        }
        else {
            $msg="Renseigner tous les champs...";    
            }
} else {
            // appel du script de vue qui permet de gerer l'affichage des donnees
            $titre = "Inscription ";
            include RACINE . "/vues/entete.php";
            include RACINE . "/vues/vueInscription.php";
            
        }
?>