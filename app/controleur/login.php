<?php

    require_once RACINE . "/modele/bd.authentification.php";

 
     $aut = new \Mymedical\modele\Connexion();
 
     if(!($aut->isLoggedOn())){
         $dis_url = $_SERVER['REQUEST_URI'];
        $uri = trim(strtok($dis_url, '?'));
        $hote =  'https://'.$_SERVER['SERVER_NAME'].$uri;

        header("Location: ". $hote);
        exit();

     }
        

?>