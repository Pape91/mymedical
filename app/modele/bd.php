<?php

namespace Mymedical\modele;

use Dotenv\Dotenv;

// Importation des classes et objets nécessaires à l'extérieur de l'espace de noms
use PDO; // Pour la connexion à la base de données avec PDO
use PDOException; // Pour la gestion des erreurs liées à la base de données avec PDO
use Exception; // Pour la gestion des erreurs génériques

abstract class DbConnector
{
  // Singleton  --- permet de définir qu'une seule fois le pdo et d'optimiser l'accès à la bdd
  private static $bdd = null;

  // méthode de connexion à la bdd
  public static function dbConnect()
  {
    // Si la connexion à la base de données est déjà établie, retourne l'objet PDO existant pour éviter de répéter la connexion
    if (isset(self::$bdd)) {
      return self::$bdd;
    } else {
      try {
        if(isset($_ENV['DB_PORT']) && (!empty($_ENV['DB_PORT']))){
          $port = ":" . $_ENV['DB_PORT'];
        }
        else{
          $port = "";
        }
        // Création d'un nouvel objet PDO pour établir une connexion à la base de données en utilisant les informations d'identification stockées dans un fichier .env
        self::$bdd = new PDO(
          "mysql:dbname=" . $_ENV['DB_NAME'] . "; host=" . $_ENV['DB_HOST'] . "; charset=utf8", 
          $_ENV['DB_USERNAME'],
          $_ENV['DB_PASSWORD']
        );

        // Configuration de l'objet PDO pour afficher les erreurs de la base de données sous forme d'exceptions
        self::$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        // Renvoie l'objet PDO pour permettre l'exécution de requêtes sur la base de données
        return self::$bdd;
      } catch (PDOException $e) {
        // En cas d'erreur liée à la base de données, lève une exception générique pour signaler l'erreur
          throw new Exception($e->getMessage());
      }
    }
  }

}

?>
