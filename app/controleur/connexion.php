<?php

    /**
    *   Controleur secondaire : connexion 
    */

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    // inclusion des fichiers nécessaires
    require_once RACINE . "/modele/authentification.php";
    //include_once __DIR__ . "/config.php";
    include_once RACINE . "/modele/bd.utilisateur.inc.php";
    include_once RACINE . "/modele/bd.patient.php";
    include_once RACINE . "/modele/bd.medecin.php";
    include_once RACINE . "/modele/bd.admin.php";

    // initialisation des objets nécessaires
    $aut = new \Mymedical\modele\Connexion();
    $utilisateur = new \Mymedical\modele\Utilisateur();

    // vérification si l'utilisateur est déjà connecté, le déconnecter dans ce cas
    if($aut->isLoggedOn())
        $aut->logout();

    $formulaireOk = true;

    // si les informations de connexion ont été soumises
    if (isset($_POST["email"]) && isset($_POST["password"])){
        $email=htmlspecialchars($_POST["email"]);
        $mdpU=htmlspecialchars($_POST["password"]);

        // vérifier les informations de connexion
        $aut->login($email,$mdpU);
    }
    else
    {
        $email=null;
        $mdpU=null;

        $formulaireOk=false;
    }

    // récupérer les informations de l'utilisateur correspondant à l'email fourni
    $user = $utilisateur->getUtilisateurByMailU($email);

    // si le formulaire a été soumis mais l'utilisateur n'existe pas, le formulaire est invalide
    if($formulaireOk && !$user){
            $formulaireOk=false;
    }

    // si l'utilisateur est connecté, rediriger vers la page correspondante selon son rôle
    if ($formulaireOk && $aut->isLoggedOn()){

        
        $dis_url = $_SERVER['REQUEST_URI'];
        $uri = trim(strtok($dis_url, '?'));
        $hote =  'https://'.$_SERVER['SERVER_NAME'].$uri;

        //$_SERVER['SERVER_NAME'];
        $role = $user["role"];
        if($role=="patient"){

            $patient = $utilisateur->getPatientByIdUser($user['Id_utilisateur']);
            include RACINE . "/vues/vuePatient.php";
            header("Location: ".$hote."?action=patient");
            exit();
        }
        else if($role=="admin"){
            $admin = $utilisateur->getAdminByIdUser($user['Id_utilisateur']);
            include RACINE . "/vues/vueAdmin.php";
            header("Location: ".$hote."?action=admin");           
             exit();
        } else if($role=="medecin"){

            $medecin = $utilisateur->getMedecinByIdUser($user['Id_utilisateur']);
            include RACINE . "/vues/vueMedecin.php";
            header("Location: ".$hote."?action=medecin");           
             exit();
        }
    }
    else{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
        // appel du script de vue 
        $formulaireOk=false;
        $titre = "authentification";
        include RACINE . "/vues/vueHome.php";
        
        
        echo $aut->isLoggedOn();
    }

?>
