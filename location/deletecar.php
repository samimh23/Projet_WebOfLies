<?php
	include '../Controller/VoitureC.php';
	$voitureC=new VoitureC();
	$voitureC->supprimervoiture($_GET["code"]);
	header('Location:displaycar1.php');
    
	
?>