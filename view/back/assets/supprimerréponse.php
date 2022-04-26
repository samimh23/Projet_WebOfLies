<?php
include '../../controller/réponseC.php';
$réponseC=new réponseC();
$réponseC->supprimerréponse($_GET["id"]);
header('Location:afficher.php');
?>