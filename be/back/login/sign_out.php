<?php
 session_start();
if(isset($_SESSION['auth']))
{session_destroy();
header('Location: ./custom_user_login-v3.php');}
else 
header('Location: facebook.com');

?>