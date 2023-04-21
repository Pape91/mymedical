<?php

/**
*	Module du routing (routage).
*	Chaque action est récupérée par la méthode : $_GET
*/

function redirigeVers($action="defaut") {
	if($action == "") $action = "defaut";
    $lesActions = array();

    // Tableau associatif des actions avec leur correspondance vers les fichiers
    $lesActions["defaut"] = "vueHome.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["pre_inscription"] = "pre_inscription.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["patient"] = "patient.php";
    $lesActions["ajoutSymptome"] = "ajoutSymptome.php";
    $lesActions["admin"] = "admin.php";
    $lesActions["medecin"] = "medecin.php";
    $lesActions["declaration"] = "declaration.php";
    $lesActions["medecin"] = "medecin.php";
    $lesActions["detailsDeclarationPatient"] = "detailsDeclaration.php";
    $lesActions["reponseDeclaration"] = "reponseDeclaration.php";
    $lesActions["logout"] = "logout.php";


    // Identifier l'action correspondante
	$controler_id = $lesActions[$action];

	// Retourner le fichier correspondant à l'action ou la page par défaut si l'action n'existe pas
	if(! file_exists(__DIR__ . '/'. $controler_id) ) die("Le fichier : " . $controler_id . " n'existe pas !");

	//si la clé "action" existe dans notre tableau "lesActions" :
    if (array_key_exists($action, $lesActions)) {
		// le fichier à inclure sera retourné :
        return $controler_id;
    } else {
        return $lesActions["defaut"];
    }
}

?>