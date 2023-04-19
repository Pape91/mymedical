<?php

    /**
    *	Controleur secondaire : connexion 
    */

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    require_once RACINE . "../modele/authentification.php";
    include_once __DIR__ . "/config.php";;


     $aut = new \Mymedical\modele\Connexion();
 
     if($aut->isLoggedOn())
         $aut->logout();


    header("Location: http://localhost/mymedical");
    exit();

?>