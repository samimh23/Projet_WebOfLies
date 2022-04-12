<?php
    include_once 'C:\xampp\htdocs\Be_Free_Project\be\back\controllers\utilisateursC.php';
    include_once 'C:\xampp\htdocs\Be_Free_Project\be\back\models\utilisateurs.php';

    $error = "";

    // create utilisateur
    $utilisateur = null;

    // create an instance of the controller
    $utilisateurc = new utilisateurc();
    if (
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		//isset($_POST["id"]) && 
        isset($_POST["email"]) && 
        isset($_POST["password"])
    ) {
        if (
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
		//	!empty($_POST["id"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["password"])
        ) {
            $utilisateur = new utilisateur(
				$_POST['nom'],
                $_POST['prenom'], 
				$_POST['password'],
                $_POST['email'],
               // $_POST['id']
            );
            $utilisateurc->modifierutilisateur($utilisateur, $_POST["id"]);
            header('Location:utilisateur.php');
        }
        else
            $error = "Missing information";
    }    
?>