<?php

    /**
    *   Controleur secondaire : connexion 
    */

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    // inclusion des fichiers nécessaires
    require_once RACINE . "/modele/bd.authentification.php";
    include_once RACINE . "/modele/bd.utilisateur.php";
    include_once RACINE . "/modele/bd.patient.php";
    include_once RACINE . "/modele/bd.medecin.php";
    include_once RACINE . "/modele/bd.admin.php";

    // initialisation des objets nécessaires
    $aut = new \Mymedical\modele\Connexion();
    $utilisateur = new \Mymedical\modele\Utilisateur();
    
    $typeUser = $_GET['typeUser'];
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

    $message;

    // si l'utilisateur est connecté, rediriger vers la page correspondante selon son rôle
    if ($formulaireOk && $aut->isLoggedOn() && isset($user["role"])){

        
        $dis_url = $_SERVER['REQUEST_URI'];
        $uri = trim(strtok($dis_url, '?'));
        $hote =  'https://'.$_SERVER['SERVER_NAME'].$uri;

        //$_SERVER['SERVER_NAME'];
        $role = $user["role"];
        if($role=="patient" && $typeUser=="patient"){

            $patient = $utilisateur->getPatientByIdUser($user['Id_utilisateur']);
            header("Location: ".$hote."?action=patient");
            exit();
        }
        else if($role=="admin" && $typeUser=="gestionnaire"){
            $admin = $utilisateur->getAdminByIdUser($user['Id_utilisateur']);
            header("Location: ".$hote."?action=admin");           
             exit();
        } else if($role=="medecin" && $typeUser=="medecin"){

            $medecin = $utilisateur->getMedecinByIdUser($user['Id_utilisateur']);
            header("Location: ".$hote."?action=medecin");           
            exit();

        }
        else{

            if($role!=$typeUser)
                $message="Veuillez saisir les identifiants d'un  ".$typeUser;
            else 
                $message='Mail ou mot de passe incorrect';
            $aut->logout();
            $formulaireOk=false;
            require RACINE . "/vues/vueEntete.php";
            require RACINE . "/vues/vueConnexion.php";
            require RACINE . "/vues/vueFooter.php";
        }
    }
    else{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
        // appel du script de vue 
        $message='Mail ou mot de passe incorect';
        $formulaireOk=false;
        require RACINE . "/vues/vueEntete.php";
        require RACINE . "/vues/vueConnexion.php";
        require RACINE . "/vues/vueFooter.php";

    }

?>
