<?php session_start(); ?>
<?php require_once '../controllers/utilisateursC.php';
require_once '../controllers/config.php';
include_once '../models/utilisateurs.php';
// session_start();
$utilisateur = null;
$utilisateurc = new utilisateurc;
$listeutilisateurs = $utilisateurc->recupererutilisateur();
if(isset($_POST['emaiil']))
{
    if(!empty($_POST['emaiil']))
    {
        foreach ($listeutilisateurs as $utilisateur) {
			if ($utilisateur['email'] == $_POST['emaiil']) 
            {
                // $_SESSION['code']=$utilisateur['code'];
                $_SESSION['email']=$utilisateur['email'];
                // $_SESSION['code']=$code;
                 header('Location: mail_send.php');
            }
    }
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="password-forgotten.php" method="POST" autocomplete="no">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    
                    <div class="form-group">
                        <input class="form-control" type="email" name="emaiil" placeholder="Enter email address" required >
                    </div>
                    <button type="submit" >Submit</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
