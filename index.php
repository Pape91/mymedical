<?php

require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

define("RACINE", dirname(__FILE__)."/app"); // enlever tous les fichiers config


//require __DIR__ . "/app/controleur/config.php";
require RACINE . "/controleur/routage.php";
require RACINE . "/modele/bd.authentification.php";

//$action=""

if (isset($_GET["action"])) {
  $action = $_GET["action"];
  $fichier = redirigeVers($action);
  
  require dirname(__FILE__) . "/app/controleur/" . $fichier;
}
  else{
    require RACINE . '/vues/vueEntete.php';
    require RACINE . '/vues/vueAccueil.php';
    require RACINE . "/vues/vueFooter.php";

  }
?>