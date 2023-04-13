<?php

namespace Mymedical\modele;

include_once "bd.php";
use Mymedical\modele\bd;
use PDO;

class Declaration extends DbConnector{

    public function soumettreDeclaration($Id_declaraion, $date_declaration, $symptomes_rajoutes, $Id_patient){
        try {
            $bdd = $this->dbConnect();

            $req = $bdd->prepare("INSERT INTO declaration_symptomes(Id_declaraion, date_declaration, symptome_rajoutes,
            id_patients) VALUES(:Id_declaraion,:date_declaration,:symptome_rajoutes,:id_patients)");

            $req->bindParam(':Id_declaraion',$Id_declaraion);
            $req->bindParam(':date_declaration',$date_declaration);
            $req->bindParam(':symptome_rajoutes',$symptome_rajoutes);
            $req->bindParam(':id_patients',$id_patients);

            $resultat = $req->execute();

        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage());
        }
        return $resultat;
    }


}