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

    include_once  ('login.php');
    include_once __DIR__ . "/config.php";
    require_once RACINE . "/modele/authentification.php";
    require_once RACINE . "/modele/bd.utilisateur.inc.php";

    // recuperation des donnees GET, POST, et SESSION

    $con = new \Mymedical\modele\Connexion();
    // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
    if ($con->isLoggedOn()){
        $utilisateur = new \Mymedical\modele\Utilisateur();
        $mailU = $con->getMailULoggedOn();
        $user = $utilisateur->getUtilisateurByMailU($mailU);
        $admin = $utilisateur->getAdminByIdUser($user['Id_utilisateur']);

        // require ('app/vues/vueAdmin.php');
        // require ('app/vues/vueFooter.php');
    
} else {
    $titre = "Mon profil";
    include RACINE . "../vues/vueEntete.php";
}

    $message="";
    if (isset($_POST['symptome'])) {
        $symptome = $_POST["symptome"];

        $objSymptome = new \Mymedical\modele\Symptome();

        $res = $objSymptome->getSymptomeByName($symptome);
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