<?php
require './Mail/phpmailer/PHPMailerAutoload.php';
require './Mail/phpmailer/class.smtp.php';
require './Mail/phpmailer/class.phpmailer.php';
$mail = new PHPMailer;

// $mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mehdi.fathallah@esprit.tn';                 // SMTP username
$mail->Password = '201JFT2673';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('mehdi.fathallah@esprit.tn', 'Mailer');
// $mail->addAddress('fathallahmehdi20@gmail.com', 'mehdi fathallah');     // Add a recipient
$mail->addAddress('fathallahmehdi20@gmail.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
//  $mail->addCC('cc@example.com');
//  $mail->addBCC('bcc@example.com');

//  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}