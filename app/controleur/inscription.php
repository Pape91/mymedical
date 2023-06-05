<?php

/**
*	Controleur secondaire : inscription 
*/

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

// Inclusion des fichiers nécessaires
include_once RACINE . "/modele/bd.utilisateur.php";
include_once RACINE . "/modele/bd.patient.php";
include_once RACINE . "/modele/bd.medecin.php";
include_once RACINE . "/modele/bd.admin.php";

// Initialisation des variables
$inscrit = false;
$msg = "My Medical";

// Si les données ont été soumises via le formulaire
if (isset($_POST['email'])) {

    // Récupération des données
    $mailU = htmlspecialchars($_POST["email"]);
    $mdpU = htmlspecialchars($_POST["mot_de_passe"]);
    $role = htmlspecialchars($_POST["role"]);
    $genre = htmlspecialchars($_POST["genre"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $dateN = htmlspecialchars($_POST["date_de_naissance"]);
    $num = htmlspecialchars($_POST["num"]);
   
    // Enregistrement des données dans la base de données
    $user = new \Mymedical\modele\Utilisateur();
    $data_user = $user->getUtilisateurByMailU($mailU);

    // Vérification que l'utilisateur n'existe pas déjà dans la base de données
    if (!$data_user) {

        $ret = $user->addUtilisateur($mailU, $mdpU, $role, $prenom, $nom, $genre, $dateN);
        $data_user = $user->getUtilisateurByMailU($mailU);
        $message = "";

        // Ajout d'un patient, d'un médecin ou d'un administrateur selon le rôle sélectionné
        $retType;
        $typeUser;
        if ($role == "patient") {
            // créer une instance de la classe Patient
            $patient = new \Mymedical\modele\Patient();
            $retType=$patient->addPatient($data_user["Id_utilisateur"], $num);
            $typeUser="patient";
            
        } else if ($role == "medecin") {
            // créer une instance de la classe Admin

            $medecin = new \Mymedical\modele\Medecin();
            $retType=$medecin->addMedecin($data_user["Id_utilisateur"], $num);
            $typeUser="medecin";
            
        } else if ($role == "admin") {

            // créer une instance de la classe Admin
            $admin = new \Mymedical\modele\Admin();
            $retType=$admin->addAdmin($data_user["Id_utilisateur"], $num);
            $typeUser="gestionnaire";
        }

        // Si l'ajout a été effectué avec succès
        if ($ret && $retType) {
            $inscrit = true;
        } else {
            $message = "L'utilisateur n'a pas été enregistré.";
        }
    } else {
        $typeUser = $data_user["role"];
        // Si l'utilisateur existe déjà dans la base de données
        $message = "Vous êtes déjà inscrit !";
        require RACINE . '/vues/vueEntete.php';
        require RACINE . '/vues/vueConnexion.php';
        require RACINE . '/vues/vueFooter.php';
    }
} 
    // Si l'utilisateur a été inscrit avec succès
    if ($inscrit) {
            
            $message="Vous êtes inscrit avec succès";

            // appel du script de vue qui permet de gerer l'affichage des donnees
        
            require RACINE . '/vues/vueEntete.php';
            require RACINE . '/vues/vueConnexion.php';
            require RACINE . '/vues/vueFooter.php';

    }
        
?>