<?php

/**
*	Controleur secondaire : inscription 
*/

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}
include_once __DIR__ . "/config.php";
include_once RACINE . "/modele/bd.utilisateur.inc.php";


$inscrit = false;
$msg="My Medical";

// recuperation des donnees GET, POST, et SESSION (vérification à confier au front)

if (isset($_POST["email"]) && isset($_POST["mot_de_passe"]) && isset($_POST["role"]) && isset($_POST["genre"])
    && isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["date_de_naissance"]) && isset($_POST["numSecu"])
    || isset($_POST["numPro"])) {

    if ($_POST["email"] != "" && $_POST["mot_de_passe"] != "" && $_POST["role"] != "" && $_POST["genre"] != "" 
        && $_POST["prenom"] != "" && $_POST["nom"] != "" && $_POST["date_de_naissance"] != "" && $_POST["numSecu"] != "" 
        || $_POST["numPro"] != "") {
            $mailU = $_POST["mailU"];
            $mdpU = $_POST["mot_de_passe"];
            $role = $_POST["role"];
            $genre = $_POST["genre"];
            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $dateN = $_POST["date_de_naissance"];
            $numSecu = $_POST["numSecu"];
            $numPro = $_POST["numPro"];


        // enregistrement des donnees
        $user = new Utilisateur();

        $ret = $user->addUtilisateur($email, $mdpU, $role, $prenom, $nom, $genre, $dateN, $numSecu, $numPro);
        if ($ret) {
            $inscrit = true;
        } else {
            $msg = "l'utilisateur n'a pas été enregistré.";
        }
        }
        else {
            $msg="Renseigner tous les champs...";    
            }
}
        // var_dump($inscrit);
        
        if ($inscrit) {
            // appel du script de vue qui permet de gerer l'affichage des donnees
            $titre = "Inscription confirmée";
            include RACINE . "/vues/entete.php";
            include RACINE . "/vues/vuePatient.php";
            
        } else {
            // appel du script de vue qui permet de gerer l'affichage des donnees
            $titre = "Inscription pb";
            // include RACINE . "/vues/entete.php";
            include RACINE . "/vues/vueInscription.php";
            
        }
?>