<?php


namespace Mymedical\modele;

// include_once "bd.php";
include_once RACINE . "../modele/bd.utilisateur.inc.php";
require_once RACINE . "../modele/authentification.php";

use \mymedical\modele;


use PDO;

// Classe Admin

class Connexion extends DbConnector {

        function login($email, $mdpU) {
            if (!isset($_SESSION)) {
                session_start();
            }

            $user = new \Mymedical\modele\Utilisateur();
            $util = $user->getUtilisateurByMailU($email);
            if(!$util)
                return false;
            else $mdpBD = $util["mot_de_passe"];

            if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
                // le mot de passe est celui de l'utilisateur dans la base de donnees
                $_SESSION["email"] = $email;
                $_SESSION["mot_de_passe"] = $mdpBD;
            }
            else return false;
        }

        function logout() {
            if (!isset($_SESSION)) {
                session_start();
            }
            unset($_SESSION["email"]);
            unset($_SESSION["mot_de_passe"]);
        }

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

        function isLoggedOn() {
            if (!isset($_SESSION)) {
                session_start();
            }
            $ret = false;

            if (isset($_SESSION["email"])) {
                $user = new \Mymedical\modele\Utilisateur();
                $util = $user->getUtilisateurByMailU($_SESSION["email"]);
                if ($util["email"] == $_SESSION["email"] && $util["mot_de_passe"] == $_SESSION["mot_de_passe"]
                ) {
                    $ret = true;
                }
            }
            return $ret;
        }
    }
?>
