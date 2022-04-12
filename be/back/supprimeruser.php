<?php
	include 'C:\xampp\htdocs\Be_Free_Project\be\back\controllers\utilisateursC.php';
	$utilisateurc=new utilisateurc();
	$utilisateurc->supprimerutilisateur($_GET["id"]);
	header('Location:index.php');
?>