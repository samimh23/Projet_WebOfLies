<?php
session_start();
?>
<?php
require_once '../controllers/utilisateursC.php';
require_once '../controllers/config.php';
include_once '../models/utilisateurs.php';

// session_start();
$utilisateuur = new utilisateurc;
$code_verification = $_SESSION['code_verification'];
// $utilisateur_verif = $_SESSION['utilisateur_verif'];
$nom_verif=$_SESSION['nom_verif'] ;
$prenom_verif=$_SESSION['prenom_verif'] ;
$email_verif=$_SESSION['email_verif']  ;
// password_hash($_POST['pwd'],PASSWORD_DEFAULT)
$pwd_verif=$_SESSION['pwd_verif'] ;
if (isset($_POST['code_verif'])) {
    if (!empty($_POST['code_verif'])) {

        if ($code_verification == $_POST['code_verif']) {
?>
            <script>
                alert("YOU HAVE ENTERED THE CORRECT CODE");
            </script>
<?php $utilisateur=new utilisateur(
    $nom_verif,
    $prenom_verif,
    $email_verif,
    $pwd_verif

);
$utilisateuur->ajouterutilisateur($utilisateur);
            header('Location: custom_user_login-v3.php');
            /* else
            {
                ?><script>alert("WRONG CODE TRY AGAIN");</script>
                <?php
            }*/
            ?>
            <script>
                alert("YOU HAVE ENTERED THE CORRECT CODE");
            </script>
<?php
        }
    }
}
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
                <form action="mail_verification_two.php" method="POST" autocomplete="no">
                    <!--<h2 class="text-center">Forgot Password</h2>-->
                    <p class="text-center">A code has been sent to your email </p>
                    <p class="text-center">Please Enter verification code</p>
                    
                    <div class="form-group">
                        <input class="form-control" type="text" name="code_verif" placeholder="Enter code here" required>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>