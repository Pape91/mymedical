<?php

namespace Mymedical\modele;

// include_once "bd.php";
use Mymedical\modele\bd;
use PDO;

// classe Patient

class Patient extends DbConnector {

    public function addPatient($Id_utilisateur, $numSecu) {
        try {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("INSERT INTO patients (numSecu, Id_utilisateur) VALUES ( :numSecu, :Id_utilisateur)");
            $req->bindParam(':numSecu', $numSecu);
            $req->bindParam(':Id_utilisateur', $Id_utilisateur);
             
            $resultat = $req->execute();

        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage() );
        }
        return $resultat;
    }
}

?>