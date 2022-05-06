<?php
include '../../controller/RéponseC.php';
$Reponse=new RéponseC();
$Reponse->supprimerréponse($_GET["id"]);
header('Location:afficherreponse.php');
?>
