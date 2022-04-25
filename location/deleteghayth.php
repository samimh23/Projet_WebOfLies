<?php
	include '../Controller/ReservationC.php';
	$reservationC=new ReservationC();
	$reservationC->supprimerreservation($_GET["code"]);
    header('Location:displayghayth.php');
	
?>