<?php

/**
*	Controleur secondaire : connexion 
*/

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

require_once RACINE . "../modele/authentification.php";
include_once __DIR__ . "/config.php";
include_once RACINE . "../modele/bd.utilisateur.inc.php";
include_once RACINE . "../modele/bd.patient.php";
include_once RACINE . "../modele/bd.medecin.php";
include_once RACINE . "../modele/bd.admin.php";

// creation du menu burger
// $menuBurger = array();
// $menuBurger[] = ["url"=>"./?action=connexion","label"=>"Connexion"];
// $menuBurger[] = ["url"=>"./?action=inscription","label"=>"Inscription"];

//recuperation des donnees GET, POST, et SESSION

$formulaireOk = true;
if (isset($_POST["email"]) && isset($_POST["password"])){
    $email=$_POST["email"];
    $mdpU=$_POST["password"];
}
else
{
    $email=null;
    $mdpU=null;

    $formulaireOk=false;
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees
$aut = new \Mymedical\modele\Connexion();
$utilisateur = new \Mymedical\modele\Utilisateur();
$aut->login($email,$mdpU);

$user = $utilisateur->getUtilisateurByMailU($email);
if($formulaireOk && !$user){
        $formulaireOk=false;
}

if ($formulaireOk && $aut->isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil

   
    $role = $user["role"];
    if($role=="patient"){

        include RACINE . "../vues/vuePatient.php";
        header("Location: http://localhost/mymedical/?action=patient");
        exit();
    }
    else if($role=="admin"){

        include RACINE . "../vues/vueAdmin.php";
        header("Location: http://localhost/mymedical/?action=ajoutSymptome");
        exit();
    } else if($role=="medecin"){

        include RACINE . "../vues/vueMedecin.php";
        header("Location: http://localhost/mymedical/?action=medecin");
        exit();
    }else{
        echo  $role;
    }
}
else{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    $titre = "authentification";
    include RACINE . "../vues/vueEntete.php";
    include RACINE . "../vues/vueHome.php";
    // include RACINE . "/vue/pied.html.php";
}

?>