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

    public function getPatientByIdUser($idUser) {

        try {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT * FROM patients WHERE Id_utilisateur=:id_patient");
            $req->bindValue(':id_patient', $idUser, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage() );
        }
        return $resultat;
    }


    public function getMedecinByIdUser($idUser) {

        try {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT * FROM medecin WHERE Id_utilisateur=:Id_medecin");
            $req->bindValue(':Id_medecin', $idUser, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage() );
        }
        return $resultat;
    }
    public function getAdminByIdUser($idUser) {

        try {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT * FROM admin WHERE Id_utilisateur=:Id_admin");
            $req->bindValue(':Id_admin', $idUser, PDO::PARAM_STR);
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
           
            $resultat = $req->execute();


        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage());
        }
        return $resultat;
    }


    public function getListDeclarationPatient($id_patient){

        $resultat = array();
        try {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT * FROM declaration WHERE id_patient=:id_patient");
            $req->bindValue(':id_patient', $id_patient);
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

    //deatils déclaration d'un patient
    public function getDeclarationDetails($id_declaration){

        $resultat = array();
        try {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT s.nom_symptome, di.reponse_declaration, di.date_reponse, d.est_traitee ,d.date_declaration, d.autres  FROM declaration_symptomes ds 
                    INNER JOIN declaration d 
                        ON d.id_declaration = ds.Id_declaration 
                    INNER JOIN symptomes_type s 
                        ON s.Id_symptome = ds.Id_symptome  
                        INNER JOIN diagnostic di  
                        ON di.Id_declaration = d.id_declaration   
                    WHERE ds.Id_declaration=:id_declaration");

            $req->bindValue(':id_declaration', $id_declaration);
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


        public function getAllDeclarationNonTraitees(){

            $resultat = array();

            try {
                $bdd = $this->dbConnect();
                $req = $bdd->prepare("SELECT * FROM declaration WHERE est_traitee is false");
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
