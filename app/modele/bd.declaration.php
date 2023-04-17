<?php

namespace Mymedical\modele;

//include_once "bd.php";
use Mymedical\modele\bd;
use PDO;

class Declaration extends DbConnector{

    public function addDeclaration($Id_patient){
        try {
            $bdd = $this->dbConnect();

            $req = $bdd->prepare("INSERT INTO declaration(id_patient, date_declaration, est_traitee, observation)
            VALUES(:id_patient, :date_declaration, :est_traitee, :observation)");

            $date = new \DateTime();
            $date = $date->format('Y-m-d H:i:s');
            $est_traite=false;
            $observation="";
            $req->bindParam(':id_patient', $Id_patient);
            $req->bindParam(':date_declaration',  $date);
            $req->bindParam(':est_traitee', $est_traite);
            $req->bindParam(':observation',  $observation);
            
            $req->execute();

            $resultat = $bdd->lastInsertId();

        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage());
        }
        return $resultat;
    }

    public function addDeclaration_symptome($idDeclaration, $listSymptome){
        try {

            $bdd = $this->dbConnect();

            foreach($listSymptome as $symptome){

                $req = $bdd->prepare("INSERT INTO declaration_symptomes(Id_declaration, Id_symptome)
                VALUES(:Id_declaration,:Id_symptome)");

                $req->bindParam(':Id_declaration', $idDeclaration);
                $req->bindParam(':Id_symptome', $symptome);

                $resultat = $req->execute();
            }

        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage());
        }
    }

}