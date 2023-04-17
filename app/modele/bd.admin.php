<?php

namespace Mymedical\modele;

// include_once "bd.php";
use Mymedical\modele\bd;
use PDO;

// Classe Admin

class Admin extends DbConnector {

    public function addAdmin($Id_utilisateur, $numPro) {
        try {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("INSERT INTO admin (numPro, Id_utilisateur) VALUES (:numPro, :Id_utilisateur)");
            $req->bindParam(':numPro', $numPro);
            $req->bindParam(':Id_utilisateur', $Id_utilisateur);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage() );
        }
        return $resultat;
    }
}

?>