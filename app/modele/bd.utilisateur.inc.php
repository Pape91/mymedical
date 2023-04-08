<?php

namespace Mymedical\modele;

include_once "bd.php";
use Mymedical\modele\bd;
use PDO;

// Classe Utilisateur

class Utilisateur extends DbConnector {

    public function getUtilisateurs() {

        try {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT * FROM utilisateur");
            $req->execute();

            $resultat = array();
            while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
                $resultat[] = $ligne;
            }
        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage() );
        }
        return $resultat;
    }

        public function getUtilisateurByMailU($email) {

        try {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT * FROM utilisateur WHERE email=:email");
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage() );
        }
        return $resultat;
    }

        public function addUtilisateur($email, $mdpU, $role, $prenom, $nom, $genre, $dateN) {
        try {
            $bdd = $this->dbConnect();

            $mdpUCrypt = crypt($mdpU, "sel");
            $req = $bdd->prepare("INSERT INTO utilisateur (email, mot_de_passe, role, prenom, nom, genre, date_de_naissance)
            values(:email,:mot_de_passe,:role,:prenom,:nom,:genre,:date_de_naissance)");
            $req->bindParam(':email', $email);
            $req->bindParam(':mot_de_passe', $mdpUCrypt);
            $req->bindParam(':role', $role);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':nom', $nom);
            $req->bindParam(':genre', $genre);
            $req->bindParam(':date_de_naissance', $dateN);
            //$req->bindValue(':numSecu', $numSecu, PDO::PARAM_STR);
            //$req->bindValue(':numPro', $numPro, PDO::PARAM_STR);

            $resultat = $req->execute();

            // var_dump($resultat);

        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage());
        }
        return $resultat;
    }

}

?>
