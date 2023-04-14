<?php

require __DIR__ . '/vendor/autoload.php';

//Dotenv
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
// require dirname(__FILE__) . "/app/controleur/config.php";
// var_dump(dirname(__FILE__));
//require dirname(__FILE__)  . "/app/controleur/routage.php";
require "app/controleur/config.php";
require "app/controleur/routage.php";
require "app/modele/authentification.php";

//$action="";
if (isset($_GET["action"])) {
  $action = $_GET["action"];
  $fichier = redirigeVers($action);
  
  require dirname(__FILE__) . "/app/controleur/" . $fichier;
}
  else{

    require ('app/vues/vueEntete.php');
    require ('app/vues/vueHome.php');
  }
//Ajoute un controleur secondaire ($fichier) en fonction du metier ($action) :


?>