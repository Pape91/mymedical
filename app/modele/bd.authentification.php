<?php
// On commence par déclarer l'espace de noms et inclure les fichiers nécessaires
namespace Mymedical\modele;

include_once RACINE . "/modele/bd.utilisateur.php";
//require_once RACINE . "/modele/authentification.php";

use \mymedical\modele;

use PDO;

// On définit la classe Connexion qui hérite de DbConnector
class Connexion extends DbConnector {
    // Cette fonction permet de connecter l'utilisateur
    function login($email, $mdpU) {
        // On démarre la session
        if (!isset($_SESSION)) {
            session_start();
        }

        // On crée un nouvel objet Utilisateur et on récupère l'utilisateur via son email
        $user = new \Mymedical\modele\Utilisateur();
        $util = $user->getUtilisateurByMailU($email);

        // Si l'utilisateur n'existe pas, on renvoie faux
        if(!$util)
            return false;
        else{
            $mdpBD = $util["mot_de_passe"];
            // Si le mot de passe de l'utilisateur correspond à celui de la base de données, on le connecte
            if (password_verify($mdpU, $mdpBD)) {
                $_SESSION["email"] = $email;
                $_SESSION["mot_de_passe"] = $mdpBD;
                $_SESSION["role"] = $util['role'];
            }
            else return false;
        }         
    }

    // Cette fonction permet de déconnecter l'utilisateur
    function logout() {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION["email"]);
        unset($_SESSION["mot_de_passe"]);
        unset($_SESSION["role"]);
    }
    
    // Cette fonction permet de récupérer l'email de l'utilisateur connecté
    function getMailULoggedOn(){
        $con = new \Mymedical\modele\Connexion();
        if ( $con->isLoggedOn()){
            $ret = $_SESSION["email"];
        }
        else {
            $ret = null;
        }
        return $ret;                
    }

    // Cette fonction permet de récupérer l'utilisateur connecté
    function getUserLoggedOn(){
        $con = new \Mymedical\modele\Connexion();
        if ( $con->isLoggedOn()){
            $email = $_SESSION["email"];
            $user = new \Mymedical\modele\Utilisateur();
            $ret = $user->getUtilisateurByMailU($email);
        }
        else {
            $ret = null;
        }
        return $ret;                
    }

    // Cette fonction permet de savoir si l'utilisateur est connecté ou pas
    function isLoggedOn() {

        $ret = false;
        try{
            if (!isset($_SESSION)) {
                session_start();
            }
              
            if (isset($_SESSION["email"])) {
                $user = new \Mymedical\modele\Utilisateur();
                $util = $user->getUtilisateurByMailU($_SESSION["email"]);
    
                if ($util["email"] == $_SESSION["email"] && $util["mot_de_passe"] == $_SESSION["mot_de_passe"]) {
                    $ret = true;
                }
            }
        }
        catch(Exception $error){}

        return $ret;
    }
}
?>
