<?php

// // include_once "bd.php";

// namespace Mymedical\modele;

// use PDO;

// class utilisateur extends DbConnector {


// function getUtilisateurs() {

//     try {
//         $bdd = dbConnect();
//         $req = $bdd->prepare("select * from utilisateur");
//         $req->execute();

//         $ligne = $req->fetch(PDO::FETCH_ASSOC);
//         while ($ligne) {
//             $resultat[] = $ligne;
//             $ligne = $req->fetch(PDO::FETCH_ASSOC);
//         }
//     } catch (PDOException $e) {
//         die( "Erreur !: " . $e->getMessage() );
//     }
//     return $resultat;
// }

// function getUtilisateurByMailU($email) {

//     try {
//         $cnx = connexionPDO();
//         $req = $cnx->prepare("select * from utilisateur where email=:email");
//         $req->bindValue(':email', $email, PDO::PARAM_STR);
//         $req->execute();
        
//         $resultat = $req->fetch(PDO::FETCH_ASSOC);
//     } catch (PDOException $e) {
//         die( "Erreur !: " . $e->getMessage() );
//     }
//     return $resultat;
// }

// function addUtilisateur($email, $mdpU, $role, $prenom, $nom, $genre, $dateN, $numSecu, $numPro) {
//     try {
//         $cnx = connexionPDO();

//         $mdpUCrypt = crypt($mdpU, "sel");
//         $req = $cnx->prepare("insert into utilisateur (email, mot_de_passe, role, prenom, nom, genre, date_de_naissance, numSecu, numPro)
//         values(:email,:mot_de_passe,:role,:prenom,:nom,:genre,:date_de_naissance,:numSecu,:numPro)");
//         $req->bindValue(':email', $mailU, PDO::PARAM_STR);
//         $req->bindValue(':mdpU', $mdpUCrypt, PDO::PARAM_STR);
//         $req->bindValue(':role', $role, PDO::PARAM_STR);
//         $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
//         $req->bindValue(':nom', $nom, PDO::PARAM_STR);
//         $req->bindValue(':genre', $genre, PDO::PARAM_STR);
//         $req->bindValue(':date_de_naissance', $dateN, PDO::PARAM_STR);
//         $req->bindValue(':numSecu', $numSecu, PDO::PARAM_STR);
//         $req->bindValue(':numPro', $numPro, PDO::PARAM_STR);

//         $resultat = $req->execute();
//     } catch (PDOException $e) {
//         die( "Erreur !: " . $e->getMessage());
//     }
//     return $resultat;
// }

// }

// if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
//     // prog principal de test
//     header('Content-Type:text/plain');

//     echo "getUtilisateurs() : \n";
//     print_r(getUtilisateurs());

//     echo "getUtilisateurByMailU(\"mathieu@gmail.dom\") : \n";
//     print_r(getUtilisateurByMailU("mathieu@gmail.dom"));

//     echo "addUtilisateur('mathieu@gmail.dom', 'azerty', 'mat') : \n";
//     addUtilisateur("mathieu@gmail.dom", "azerty", "mat");
// }

namespace Mymedical\modele;

// require __DIR__ . '/../../vendor/autoload.php';
// require_once "bd.php";
include_once "bd.php";
use Mymedical\modele\bd;
use PDO;

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

        public function addUtilisateur($email, $mdpU, $role, $prenom, $nom, $genre, $dateN, $numSecu, $numPro) {
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

            var_dump($resultat);

        } catch (PDOException $e) {
            die( "Erreur !: " . $e->getMessage());
        }
        return $resultat;
    }

}


?>
