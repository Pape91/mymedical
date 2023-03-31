<?php

require __DIR__ . '/vendor/autoload.php';

//Dotenv
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

/**
*	Controleur principal  
*/

// Vérification de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $dbname = $_POST['dbname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    // Vérification des informations de connexion
    if ($dbname === $_ENV['DB_NAME'] && $username === $_ENV['DB_USERNAME'] && $password === $_ENV['DB_PASSWORD']) {
      // Redirection vers une page de connexion réussie
      require ('app/vues/home.php');
    //   echo  ("connexion réussie");
      exit();
    } else {
      // Redirection vers une page de connexion échouée
      
      echo  ("connexion échouée");

      exit();
    }
  } else {
    // Affichage de la vue de connexion
    require ('app/vues/login.php');
  }

// require ('app/vues/login.php');


?>