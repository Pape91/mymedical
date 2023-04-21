<?php

    /**
    *	Controleur secondaire : monProfil
    */

    include_once RACINE . "../modele/bd.utilisateur.inc.php";

    use \mymedical\modele;

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : '.basename(__FILE__));
    }

    include_once  'login.php';
    include_once RACINE . "/modele/bd.ajoutSymptome.php";
    require_once RACINE . "/modele/authentification.php";
    require_once RACINE . "/modele/bd.utilisateur.inc.php";

    // recuperation des donnees GET, POST, et SESSION

    $con = new \Mymedical\modele\Connexion();
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
        
        require RACINE . "/vues/vueEntete.php";
        require RACINE . "/vues/vueAdmin.php";
        require RACINE . "/vues/vueFooter.php";
        
    } else {

        require RACINE . '/vues/vueEntete.php';
        require RACINE . '/vues/vueHome.php';
        require RACINE . '/vues/vueEntete.php';
    }

?>
