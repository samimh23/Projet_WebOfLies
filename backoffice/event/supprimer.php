<?php
	include_once './Model/Event.php';
	include_once './Controller/EventController.php';

    $eventController = new EventController();
	$id = $_GET['id'];
	$eventController->supprimerEvent($id);
	header('Location:index.php');
?>