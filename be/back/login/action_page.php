<?php
require '../controllers/config.php';
include_once '../controllers/utilisateursC.php';
include_once '../models/utilisateurs.php';
//require '../config.php';

// create an instance of the controller
/*$utilisateurC = new utilisateurc();
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['rpwd'])) {
        
        $utilisateur = new utilisateur($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['password'],$_POST['rpwd']);
        $utilisateurC->ajouterutilisateur($utilisateur);}
        //header('Location:index.php');*/

$utilisateursC = new utilisateurc();
if (isset($_POST['lastname']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pwd'])) {

    $utilisateur = new utilisateur($_POST['lastname'], $_POST['name'], $_POST['email'], $_POST['pwd']);
    $utilisateursC->modifierutilisateur($utilisateur, $_POST['email']);
}
?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <form action="action_page.php" method="POST">
        <div class="container">
            <label for="uname"><b>LastName</b></label>
            <input type="text" placeholder="Enter LastName" name="lastname" required>
            <label for="email"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter email" name="email" required>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pwd" required>
            <button type="submit">Submit</button>

        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</body>

</html>