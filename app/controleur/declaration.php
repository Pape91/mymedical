<?php

    include_once RACINE . "../modele/bd.ajoutSymptome.php";

    use \Mymedical\modele;

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }
    include_once __DIR__ . "/config.php";

    require_once RACINE . "/modele/authentification.php";
    require_once RACINE . "/modele/bd.declaration.php";

    $objDeclaration = new \Mymedical\modele\Declaration();

    $objSymptome = new \Mymedical\modele\Symptome();
    $listSymptomes = $objSymptome->getSymptomes();

    $message='';
    $tabSymtomes=array();

    //formulaire dynamique
    for ($i = 0; $i < count(($listSymptomes)); $i++) {

        $res = "yesno_".$listSymptomes[$i]["Id_symptome"];

        if(isset($_POST[$res]) && $_POST[$res]=="oui"){
            $tabSymtomes[]=$listSymptomes[$i]["Id_symptome"];
        }

    }

    $autre="";
    //autres symtomes
    if(isset($_POST["autre"]))
        $autre= $_POST["autre"];


    if(!empty($tabSymtomes)){

        $connexion = new \Mymedical\modele\Connexion();
        $user = $connexion->getUserLoggedOn();

        if($user!=null){

            $res = $objDeclaration->addDeclaration($user["Id_utilisateur"], $autre);

            $objDeclaration->addDeclaration_symptome($res, $tabSymtomes);

            $message = "Votre déclaration a bien été prise en compte";
            
            require ('app/vues/vueEntete.php');
            require ('app/vues/vueDeclaration.php');
            require ('app/vues/vueFooter.php');

        }
        else{
            require ('app/vues/vueEntete.php');
            require ('app/vues/vueHome.php');
            require ('app/vues/vueFooter.php');
        }
    }
    else{

        require ('app/vues/vueEntete.php');
        require ('app/vues/vueDeclaration.php');
        require ('app/vues/vueFooter.php');
    }
?>