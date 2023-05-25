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
                <p class="description">Le lorem ipsum est, en imprimerie, une suite 
                    de mots sans signification utilisée à titre provisoire pour 
                    calibrer une mise en page le texte définitif venant remplacer le faux-texte
                    dès qu'il est prêt ou que la mise en page est achevée. Généralement utilise
                    un texte en faux latin, le Lorem ipsum ou Lipsum.</p>
            </div>
       </header>
