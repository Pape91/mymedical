<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="./static/css/style.css">
    <title>My medical</title>
</head>
<body>
        <header id="bandeau" class="container">

                <h1><a href="index.php">My medical</a></h1>
                    <?php 
                        require_once RACINE . "/modele/bd.utilisateur.php";
                        
                        // recuperation des donnees GET, POST, et SESSION
                        
                        $con = new \Mymedical\modele\Connexion();
                        $res=$con->isLoggedOn();
                        if(isset($res) && $res) {?>
                        <span class="apropos">
                         <a href="?action=logout">Déconnexion</a>
                         <!-- <a href="?action=logout"><i class="fa-solid fa-xmark"></i></a> -->
                         </span>
                         <?php } else{?>

                         <nav id="menuprincipal">        
                             <div id="burger">
                                 <i class="fas fa-bars"></i>
                             </div>
                             <ul>
                                <!-- <li><a href="index.php">Accueil</a></li> -->
                                <li><a href="index.php?action=home&type=patient">Patient</a></li>
                                <li><a href="index.php?action=home&type=medecin">Medecin</a></li>
                                <li><a href="index.php?action=home&type=gestionnaire">Gestionnaire</a></li>
                                <li><a href="./?action=pre_inscription">S'inscrire</a></li>
                             </ul>
                         </nav> 
                         <?php  }?>

            <div class="titre">
                <p class="description">Cette application vise à offrir un avis médical sur 
                    une pathologie aux utilisateurs tiers. Il permet aux patients de déclarer leurs symptômes
                     et d'obtenir des indications sur la gravité de leur état ainsi que des conseils sur les 
                     traitements possibles. Les utilisateurs peuvent s'inscrire en tant que patients ou médecins. 
                     Les patients peuvent consulter l'historique de leurs déclarations précédentes, tandis que 
                     les médecins peuvent accéder aux demandes d'avis en attente et fournir des diagnostics ou 
                     des conseils médicaux. Ce site facilite ainsi l'accès aux avis médicaux, évitant aux patients 
                     de se déplacer inutilement ou d'attendre un rendez-vous pour des problèmes de santé mineurs.</p>
            </div>
       </header>
