<?php

    /**
    *	Controleur secondaire : connexion 
    */

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    // inclusion du script pour l'authentification
    require_once RACINE . "/modele/authentification.php";

    // inclusion du fichier de configuration
    include_once __DIR__ . "/config.php";

    // création d'une instance de la classe Connexion
    $aut = new \Mymedical\modele\Connexion();

    // vérification si l'utilisateur est connecté et déconnexion
    if($aut->isLoggedOn())
         $aut->logout();

    // redirection vers la page d'accueil
    $dis_url = $_SERVER['REQUEST_URI'];
    $uri = trim(strtok($dis_url, '?'));
    $hote =  'https://'.$_SERVER['SERVER_NAME'].$uri;
    header("Location: ".$hote);
    exit();

?>
