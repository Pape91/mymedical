<?php

    /**
    *	Controleur secondaire : monProfil
    */

    use \mymedical\modele;

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    include_once  'authentification.php';
    include_once RACINE . "/modele/bd.symptome.php";
    require_once RACINE . "/modele/bd.authentification.php";
    require_once RACINE . "/modele/bd.utilisateur.php";

    // recuperation des donnees GET, POST, et SESSION

    $con = new \Mymedical\modele\Connexion();
    $typeUser = 'gestionnaire';
    // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
    if ($con->isLoggedOn()){
        $utilisateur = new \Mymedical\modele\Utilisateur();
        $mailU = $con->getMailULoggedOn();
        $user = $utilisateur->getUtilisateurByMailU($mailU);
        $listDeclarations = $utilisateur->getAllDeclarationAvecAutres();
        $admin = $utilisateur->getAdminByIdUser($user['Id_utilisateur']);

        $message="";
        if (isset($_POST['symptome'])) {
            $symptome = $_POST["symptome"];
    
            $objSymptome = new \Mymedical\modele\Symptome();
            $res = $objSymptome->getSymptomeByName($symptome);
    
            if(!$res){
                
                $objSymptome->addSymptome($symptome);
    
                $message="Le symptôme ".$symptome. " a été bien ajouté !";
    
            }else{
               
                $message="Le symptôme ".$symptome. " existe déjà!";
    
            }
        }
        if($_SESSION["role"]=='admin'){
            require RACINE . "/vues/vueEntete.php";
            require RACINE . "/vues/vueAdmin.php";
            require RACINE . "/vues/vueFooter.php";
        }
        else {
            $con->logout();
            require RACINE . '/vues/vueEntete.php';
            require RACINE . '/vues/vueConnexion.php';
            require RACINE . "/vues/vueFooter.php";
        }
        
    } else {
        require RACINE . '/vues/vueEntete.php';
        require RACINE . '/vues/vueConnexion.php';
        require RACINE . "/vues/vueFooter.php";
    }

?>
