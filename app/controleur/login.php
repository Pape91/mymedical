<?php

    require_once RACINE . "../modele/authentification.php";

 
     $aut = new \Mymedical\modele\Connexion();
 
     if(!($aut->isLoggedOn())){

        header("Location: http://localhost/mymedical");
        exit();

     }
        

?>