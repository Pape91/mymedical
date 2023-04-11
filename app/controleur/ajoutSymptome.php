<?php

    /**
    *	Controleur secondaire : monProfil
    */

    include_once RACINE . "../modele/bd.ajoutSymptome.php";

    use \mymedical\modele;

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }
    include_once __DIR__ . "/config.php";

    $message="";
    if (isset($_POST['symptome'])) {
        $symptome = $_POST["symptome"];

        $objSymptome = new \Mymedical\modele\Symptome();

        $res = $objSymptome->getSymptomeByNom($symptome);
        // echo $res;
        if(!$res){

            $objSymptome->addSymptome($symptome);

            $message="Le symptôme ".$symptome. " a été bien ajouté !";

        }else{
            $message="Le symptôme ".$symptome. " existe déjà!";
        }
    }

    require ("app/vues/vueAdmin.php");

?>