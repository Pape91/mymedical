<?php

/**
*	Controleur secondaire : inscription 
*/

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}
    include_once RACINE . "/modele/bd.utilisateur.php";
    include RACINE . "/vues/vueEntete.php";
    include RACINE . "/vues/vueInscription.php";
    include RACINE . "/vues/vueFooter.php";

        
?>