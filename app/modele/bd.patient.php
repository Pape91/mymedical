<?php

namespace Mymedical\modele;

include_once "bd.php";
use Mymedical\modele\bd;
use PDO;

// classes Patient

class Patient extends DbConnector {

    public function addPatient($id_utilisateur, $numSecu) {
        try {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("INSERT INTO patients (Id_utilisateur, numSecu) VALUES (:Id_utilisateur, :numSecu)");
            $req->bindParam(':numSecu', $numSecu);
            $req->bindParam(':Id_utilisateur', $id_utilisateur);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage() );
        }
        return $resultat;
    }
}

?>