<?php

namespace Mymedical\modele;

use Mymedical\modele\bd;
use PDO;

class Declaration extends DbConnector{

    public function addDeclaration($Id_patient, $autres, $listSymptomes){
        try {
            $bdd = $this->dbConnect();

            $req = $bdd->prepare("INSERT INTO declaration(Id_patient, date_declaration, est_traitee, autres)
            VALUES(:Id_patient, :date_declaration, :est_traitee, :autres)");

            $req1 = $bdd->prepare("INSERT INTO diagnostic(Id_declaration)
            VALUES(:Id_declaration)");

            $date = new \DateTime();
            $date = $date->format('Y-m-d H:i:s');
            $est_traite=false;
           
            if(isset($autres) && $autres)
                $autres=null;

            $req->bindParam(':Id_patient', $Id_patient);
            $req->bindParam(':date_declaration',  $date);
            $req->bindParam(':est_traitee', $est_traite);
            $req->bindParam(':autres',  $autres);
            
            $req->execute();
            $resultat = $bdd->lastInsertId();

            foreach($listSymptomes as $symptome){
                
                $req3 = $bdd->prepare("INSERT INTO declaration_symptomes(Id_declaration, Id_symptome)
                VALUES(:Id_declaration,:Id_symptome)");

                $req3->bindParam(':Id_declaration', $resultat);
                $req3->bindParam(':Id_symptome', $symptome);

                $req3->execute();
            }

            $req1->bindParam(':Id_declaration', $resultat);
            $req1->execute();

        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage());
        }
        return $resultat;
    }

    public function addDiagnostic($Id_diagnostic, $reponse, $idMedecin, $listSymptome){
        try {
            $bdd = $this->dbConnect();

            $req = $bdd->prepare("UPDATE declaration SET est_traitee=:est_traitee WHERE Id_declaration=:Id_declaration");

            $req1 = $bdd->prepare("UPDATE diagnostic SET reponse_declaration=:reponse_declaration, Id_medecin=:Id_medecin, date_reponse=:date_reponse WHERE Id_declaration=:Id_declaration");

            $date = new \DateTime();
            $date = $date->format('Y-m-d H:i:s');
            $est_traite=true;

            $req->bindParam(':est_traitee', $est_traite);
            $req->bindParam(':Id_declaration',  $Id_diagnostic);

            $req1->bindParam(':reponse_declaration', $reponse);
            $req1->bindParam(':date_reponse',  $date);
            $req1->bindParam(':Id_medecin',  $idMedecin);
            $req1->bindParam(':Id_declaration',  $Id_diagnostic);
            
            if(($req1->execute()))
                $req->execute();

        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage());
        }

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