<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/style.css">
    <title>
        <?php if (isset($titre))
                      $titre;
              else echo("My Medical");
        ?>
    </title>
</head>
<body>
    
    <div id="corps"> 
        <header id="bandeau" class="container">
        
            <div id="tete">
                <h1>My medical</h1>
                <span class="apropos">
                    <?php 
                        require_once RACINE . "../modele/bd.utilisateur.inc.php";

                        // recuperation des donnees GET, POST, et SESSION
                        
                        $con = new \Mymedical\modele\Connexion();
                        $res=$con->isLoggedOn();
                        if(isset($res) && $res) {?>
                         <a href="?action=logout">Déconnexion</a>
                         <?php  }?>
                    <?php //else : ?>
                    <!-- <a href="#">A&nbspPROPOS</a> -->
                    <?php //endif; ?>
                </span>
            </div>
            <div id="sous_titre"><h2>Consultation</h2></div>
            <div class="titre">
                <p class="description">Le lorem ipsum est, en imprimerie, une suite 
                    de mots sans signification utilisée à titre provisoire pour 
                    calibrer une mise en page le texte définitif venant remplacer le faux-texte
                    dès qu'il est prêt ou que la mise en page est achevée. Généralement utilise
                    un texte en faux latin, le Lorem ipsum ou Lipsum.</p>
            </div>
                
            
           
        </header>