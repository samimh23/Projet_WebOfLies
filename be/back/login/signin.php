<?php
require_once '../controllers/config.php';
include_once '../controllers/utilisateursC.php';
include_once '../models/utilisateurs.php';
if(isset($_POST["email2"]) && 
isset($_POST["pwd2"]))
{
    if( !empty($_POST["email2"]) &&
    !empty($_POST["pwd2"]))
    {
        foreach ($listeutilisateurs as $utilisateurc)
{
      $verifm = password_verify($_POST['pwd2'], $utilisateurc['pwd']);
    
if (($_POST['email2']==$utilisateurc['email'])&&($verifm==true)) 
{
    $_session ['email2']=$_POST["email2"];
    $_session ['pwd2']=$_POST["pwd2"];
    header('location: ./index.php');
    }
}}} 
?>