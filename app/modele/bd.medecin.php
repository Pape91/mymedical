<?php

namespace Mymedical\modele;

// include_once "bd.php";
use Mymedical\modele\bd;
use PDO;

// Classe Médecin

class Medecin extends DbConnector {

    public function addMedecin($Id_utilisateur, $numPro) {
        try {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("INSERT INTO medecin (numPro, Id_utilisateur) VALUES (:numPro, :Id_utilisateur)");
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