<?php

namespace Mymedical\modele;

include_once "bd.php";
use Mymedical\modele\bd;
use PDO;

// classes Patient

class Symptome extends DbConnector {

    public function addSymptome($nom_symptome) {
        $resultat;
        try {
            $nom_symptome = strtolower($nom_symptome);
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("INSERT INTO symptomes_type (nom_symptome) VALUES (:nom_symptome)");
            $req->bindParam(':nom_symptome',  $nom_symptome);
           
            $resultat = $req->execute();
        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage() );
        }
        return $resultat;
    }

    public function getSymptomeByName($nom_symptome) {
        $resultat;
        try {
            $nom_symptome = strtolower($nom_symptome);
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT 1 from symptomes_type WHERE nom_symptome=:nom_symptome");
            $req->bindParam(':nom_symptome', $nom_symptome);

            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage() );
        }
        return $resultat;
    }

    public function getSymptomes() {

        $resultat = array();
        
        try {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT * from symptomes_type");
            $req->execute();
            
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = $ligne;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage() );
        }
        return $resultat;
    }


}

?>