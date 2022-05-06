<?php
include_once '../controllers/config.php';
include_once '../controllers/utilisateursC.php';
$utilisateur = null;
$utilisateurc = new utilisateurc;
$listeutilisateurs = $utilisateurc->recupererutilisateur();

?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <select >
                <?php
                foreach($listeutilisateurs as $utilisateur)
                { ?>

                   <option> <?php echo $utilisateur['nom']; ?> </option>
                <?php }
                ?>
        </select>
    </body>
</html>