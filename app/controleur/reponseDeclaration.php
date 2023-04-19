

<?php

    include_once RACINE . "../modele/bd.ajoutSymptome.php";

    use \Mymedical\modele;

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    include_once  'login.php';
    
    include_once __DIR__ . "/config.php";

    require_once RACINE . "/modele/authentification.php";
    require_once RACINE . "/modele/bd.declaration.php";

    $objDeclaration = new \Mymedical\modele\Declaration();

    $objSymptome = new \Mymedical\modele\Symptome();
    $listSymptomes = $objSymptome->getSymptomes();


    $idDeclaration =  $_GET['id_declaration'];
    $idMedecin =  $_GET['id_medecin'];
    $reponse=$_POST['reponse'];
    $estMedecin = false;
    
    $declaration = new \Mymedical\modele\Declaration();
    $declaration->addDiagnostic($idDeclaration, $reponse , $idMedecin);

    $message = "Déclarartion répondue avec succès !";

    //require ('app/vues/vueEntete.php');
    //require ('app/vues/vueMedecin.php');
    header("Location: http://localhost/mymedical/?action=medecin");
    exit();
   

?>