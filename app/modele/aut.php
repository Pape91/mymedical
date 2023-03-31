<?php

// Assurez-vous d'inclure l'autoloader de Composer

require_once __DIR__ . '/../../vendor/autoload.php';

require_once './bd.php';



use Dotenv\Dotenv;
use Mymedical\modele\DbConnector;

// Charger les variables d'environnement du fichier .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

    try {
        $connection = DbConnector::dbConnect();
        echo "Connexion réussie à la base de données.";
    } catch (PDOException $e) {
        echo "Erreur lors de la connexion à la base de données :";
    }

?>