<?php

namespace Mymedical\modele;

use Dotenv\Dotenv;

// the 3 following "use" are required to access classes and objects outside the namespace
use PDO;
use PDOException;

abstract class DbConnector
{
  // Singleton  --- permet de définir qu'une seule fois le pdo et d'optimiser l'accès à la bdd
  private static $bdd = null;

  // méthode de connexion à la bdd
  public static function dbConnect()
  {
    
    if (isset(self::$bdd)) {
      return self::$bdd;
    } else {
      try {
        self::$bdd = new PDO(
          "mysql:dbname=" . $_ENV['DB_NAME'] . "; host=" . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'] . "; charset=utf8", 
          $_ENV['DB_USERNAME'],
          $_ENV['DB_PASSWORD']
        );
        self::$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return self::$bdd;
      } catch (PDOException $e) {
          // throw the exception to the caller
          throw new Exception($e->getMessage());
      }
    }
  }

}

?>