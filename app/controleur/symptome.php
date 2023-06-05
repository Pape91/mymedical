<?php

    /**
    *	Controleur secondaire : monProfil
    */

    use \mymedical\modele;

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    include_once RACINE . '/controleur/authentification.php';




?>