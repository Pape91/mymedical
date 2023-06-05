<?php

    // Inclure le fichier contenant la fonction permettant l'ajout d'un symptôme dans la base de données
    include_once RACINE . "/modele/bd.symptome.php";

    // Utiliser le namespace "modele" de l'application
    use \Mymedical\modele;

    // Si ce fichier est appelé directement, afficher une erreur et arrêter le script
    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    // Inclure le fichier contenant les fonctions de connexion
    include_once RACINE .  '/controleur/authentification.php';

    // Inclure les fichiers contenant les classes "Authentification" et "Declaration"
    require_once RACINE . "/modele/bd.authentification.php";
    require_once RACINE . "/modele/bd.declaration.php";

    // Instancier la classe "Declaration"
    $objDeclaration = new \Mymedical\modele\Declaration();

    // Instancier la classe "Symptome" et récupérer la liste des symptômes
    $objSymptome = new \Mymedical\modele\Symptome();
    $listSymptomes = $objSymptome->getSymptomes();

    // Initialiser les variables "message" et "tabSymtomes"
    $message='';
    $tabSymtomes=array();

    // Parcourir la liste des symptômes pour récupérer les symptômes cochés dans le formulaire
    for ($i = 0; $i < count(($listSymptomes)); $i++) {

        $res = "yesno_".$listSymptomes[$i]["Id_symptome"];

        if(isset($_POST[$res]) && $_POST[$res]=="oui"){
            $tabSymtomes[]=$listSymptomes[$i]["Id_symptome"];
        }
        

    }

    // Initialiser la variable "autre" à une chaîne vide
    $autre="";

    // Récupérer la valeur du champ "autre" s'il est défini
    if(isset($_POST["autre"]))
        $autre= $_POST["autre"];

    // Si des symptômes ont été cochés dans le formulaire
    if(!empty($tabSymtomes)){

        // Instancier la classe "Connexion" pour récupérer les informations de l'utilisateur connecté
        $connexion = new \Mymedical\modele\Connexion();
        $user = $connexion->getUserLoggedOn();

        // Si l'utilisateur est connecté
        if($user!=null){

            // Ajouter une déclaration dans la base de données et récupérer l'ID de la déclaration ajoutée
            $res = $objDeclaration->addDeclaration($user["Id_utilisateur"], $autre, $tabSymtomes);

            // Ajouter les symptômes cochés dans la déclaration
            //$objDeclaration->addDeclaration_symptome($res, $tabSymptomes);

            // Afficher un message de confirmation
            $message = "Votre déclaration a bien été prise en compte";
            
            require RACINE . '/vues/vueEntete.php';
            require RACINE . '/vues/vueDeclaration.php';
            require RACINE . '/vues/vueFooter.php';

        }
        else{
            require RACINE . '/vues/vueEntete.php';
            require RACINE . '/vues/vueDeclaration.php';
            require RACINE . '/vues/vueFooter.php';
        }
    }
    else{

            require RACINE . '/vues/vueEntete.php';
            require RACINE . '/vues/vueDeclaration.php';
            require RACINE . '/vues/vueFooter.php';
    }
?>