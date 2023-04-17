<?php

/**
*	Controleur secondaire : inscription 
*/

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

include_once __DIR__ . "/config.php";
include_once RACINE . "../modele/bd.utilisateur.inc.php";
include_once RACINE . "../modele/bd.patient.php";
include_once RACINE . "../modele/bd.medecin.php";
include_once RACINE . "../modele/bd.admin.php";


$inscrit = false;
$msg="My Medical";


        if (isset($_POST['email'])) {
            
       
            $mailU = $_POST["email"];
            $mdpU = $_POST["mot_de_passe"];
            $role = $_POST["role"];
            $genre = $_POST["genre"];
            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $dateN = $_POST["date_de_naissance"];
            $num = $_POST["num"];
            // $numPro = $_POST["numPro"];


            // enregistrement des donnees

            $user = new \Mymedical\modele\Utilisateur();


            $data_user=$user->getUtilisateurByMailU($mailU);

            if(!$data_user){

                $ret = $user->addUtilisateur($mailU, $mdpU, $role, $prenom, $nom, $genre, $dateN);
                $data_user=$user->getUtilisateurByMailU($mailU);
                $message = "";
    
                if($role=="patient"){
                    // créer une instance de la classe Patient
                    $patient = new \Mymedical\modele\Patient();
                    $patient->addPatient($data_user["Id_utilisateur"], $num);
                }
                else  if($role=="medecin"){
    
                    $medecin = new \Mymedical\modele\Medecin();
                    $medecin->addMedecin($data_user["Id_utilisateur"], $num);
                }else  if($role=="admin"){
    
                    //créer une instance de la classe Admin
                    $admin = new \Mymedical\modele\Admin();
                    $admin->addAdmin($data_user["Id_utilisateur"], $num);
                }
                // echo($ret);
    
                // ajouter un nouveau médecin
                // $medecin->addMedecin('numPro', 'Id_utilisateur');
    
                // // ajouter un nouvel administrateur
                // $admin->addAdmin('numPro', 'Id_utilisateur');
                if ($ret) {
                    $inscrit = true;
                } else {
                    $msg = "l'utilisateur n'a pas été enregistré.";
                }
            }else{

                $message="Vous êtes déjà inscrit !";
                require ('app/vues/vueEntete.php');
                require ('app/vues/vueHome.php');
            }
   
    }
    else {
        $msg="Renseigner tous les champs...";    
        }
// }
        // var_dump($inscrit);

    if ($inscrit) {
        
        $message="Vous êtes inscrit avec succès";
        // appel du script de vue qui permet de gerer l'affichage des donnees
        $titre = "Inscription confirmée";
        //
        /*header("Location: http://localhost/mymedical");
        exit();*/

        require ('app/vues/vueEntete.php');
        require ('app/vues/vueHome.php');
    }
     
?>