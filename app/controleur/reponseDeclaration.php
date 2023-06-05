<?php

    // Inclusion du fichier bd.symptome.php
    include_once RACINE . "/modele/bd.symptome.php";

    use \Mymedical\modele;

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        // Si le fichier courant est celui-ci, on arrête le script et on affiche un message d'erreur
        die('Erreur : '.basename(__FILE__));
    }

    include_once RACINE . '/controleur/authentification.php';

    // Inclusion du fichier de configuration config.php
    include_once __DIR__ . "/config.php";

    // Inclusion des fichiers nécessaires
    require_once RACINE . "/modele/bd.authentification.php";
    require_once RACINE . "/modele/bd.declaration.php";

        // Création d'une instance de la classe Declaration
        $objDeclaration = new \Mymedical\modele\Declaration();

        // Création d'une instance de la classe Symptome
        $objSymptome = new \Mymedical\modele\Symptome();
        // Récupération de tous les symptômes de la base de données
        $listSymptomes = $objSymptome->getSymptomes();

        // Récupération des paramètres passés en GET
        $idDeclaration = $_GET['id_declaration'];
        $idMedecin = $_GET['id_medecin'];

        // Récupération de la réponse à la déclaration passée en POST
        $reponse = htmlspecialchars($_POST['reponse']);

        // Initialisation de la variable $estMedecin à false
        $estMedecin = false;
        
        // Création d'une instance de la classe Declaration
        $declaration = new \Mymedical\modele\Declaration();
        // Appel de la méthode addDiagnostic pour ajouter un diagnostic à la déclaration
        $declaration->addDiagnostic($idDeclaration, $reponse , $idMedecin);

        // Message de succès
        $message = "Déclaration répondue avec succès !";

        // Redirection vers la page d'accueil des médecins
        
        $dis_url = $_SERVER['REQUEST_URI'];
        $uri = trim(strtok($dis_url, '?'));
        $hote =  'https://'.$_SERVER['SERVER_NAME'].$uri;

        header("Location: ".$hote."?action=medecin");
   
?>
