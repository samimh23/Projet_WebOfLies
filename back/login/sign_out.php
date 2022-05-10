<?php session_start(); ?>
 <?php
    //  if(isset($_SESSION['auth'])){
        // unset($_SESSION);
    session_destroy();
    // session_write_close();
    header('Location: ./custom_user_login-v3.php');
    // $_SESSION['auth']=false;
    // exit;
    //  }
    //  else 
    //  header('Location: facebook.com');

    ?>