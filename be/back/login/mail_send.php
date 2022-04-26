<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        
        <?php

//include required php mailer files 
 require_once 'password-forgotten.php';
 include_once '../controllers/utilisateursC.php';
require "includeclasses/PHPMailer.php";
require "includeclasses/SMTP.php";
require "includeclasses/Exception.php";
require "includeclasses/OAuthTokenProvider.php";
//require "src/OAuth.php";
// require "src/OAuthTokenProvider.php";
//define name spaces 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_SESSION['code']))
{
    $code=$_SESSION['code'];
}
else
die('$'."_SESSION['code'] isn't set because you had never been at file one");
//use PHPmailer\PHPmailer\SMTP;
//use PHPmailer\PHPmailer\Exception;
$mail = new PHPMailer();
$mail->IsSMTP(); 
$mail->SMTPDebug = 1; 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure="ssl"; 
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
    $mail->Port ="465"; 
    $mail->IsHTML(true);
    //Username to use for SMTP authentication
    $mail->Username = "2a21group5@gmail.com";
    $mail->Password = "123azerty*";
    //Set who the message is to be sent from
    $mail->setFrom('2a21group5@gmail.com', ''); //! moch lezem 
    //Set an alternative reply-to address
    $mail->addReplyTo('fathallahmehdi20@gmail.com', 'reply services'); //! lchkoun ymchi mail ki ya3mel reply l user
    //Set who the message is to be sent to
    $mail->addAddress('mehdi.fathallah@esprit.tn', '');
    //Set the subject line
    $mail->Subject="Password reset code";
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML(" Your verification code is: $code");
    
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error:"  . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
        header('Location: reset-password.php');
    }



    // $mail1->smtpClose();

//! email w password esta3melhom 
//! 2a21group5@gmail.com
//! 123azerty*



?>

    </body>
</html>