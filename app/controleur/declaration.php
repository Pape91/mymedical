<?php

    include_once RACINE . "../modele/bd.ajoutSymptome.php";

    use \mymedical\modele;

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }
    include_once __DIR__ . "/config.php";

    $objSymptome = new \Mymedical\modele\Symptome();
    $listSymptomes = $objSymptome->getSymptomes();

    require ('app/vues/entete.php');
    require ('app/vues/vueDeclaration.php'); 
?>