
<?php
    include_once '../Model/Reservation.php';
    include_once '../Controller/ReservationC.php';

    $error = "";

    // create adherent
    $reservation = null;

    // create an instance of the controller
    $reservationC = new ReservationC();
    if (
        
		isset($_POST["date"]) &&		
        isset($_POST["jours"]) &&
		isset($_POST["mat"]) 
    ) {
        if (
            
			!empty($_POST['date']) &&
            !empty($_POST["jours"]) && 
			!empty($_POST["mat"]) 
            
        ) {
            $reservation = new reservation(
                
				$_POST['date'],
                $_POST['jours'], 
				$_POST['mat']
            );
            $reservationC->ajouterreservation($reservation);
            
        }
        else
            $error = "Missing information";
    }
    $prix=$reservationC->recuperermatricules(); 

    
?>





<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ajout d'une réservation</title>

    <!-- =============== Bootstrap Core CSS =============== -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <!-- =============== fonts awesome =============== -->
    <link rel="stylesheet" href="../assets/font/css/font-awesome.min.css" type="text/css">
    
    <link rel="stylesheet" href="../assets/css/animate.min.css" type="text/css">
    
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    
    <link href="../assets/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="../assets/owl-carousel/owl.theme.css" rel="stylesheet">
	
	 <link rel="stylesheet" href="../assets/css/isotope-docs.css" media="screen">
	  <link rel="stylesheet" href="../assets/css/baguetteBox.css">
    
</head>

<body> 
    
        <div id="loading">
		<img width="256" height="32" src="../assets/img/loading-cylon-red.svg">	
        </div>
    </div>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="container-fluid">
          
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                       
                    </button>
                    <a class="navbar-brand" href="#"><img src="../assets/img/logo.png" alt="Logo">
                    </a>
                </div>

               

                

            </div>
        </div>
    </nav>
    <header id="home" class="header">

        <script src="reserv.js"></script>
    <center><h2>Merci de réserver :</h2></center>
    
         <form action="" method="POST">
      
         <table class="form-style">
            
            <tr>
               <td>
                  <label>
                     Date de debut <span class="required">*</span>
                  </label>
               </td>
               <td>
                  <input type="date" id="date" name="date" class="long"/>
                  
               </td>
            </tr>
            <tr>
               <td>
                  <label>
                        Nombre de jours <span class="required">*</span>
                  </label>
               </td>
               <td>
                  <input type="number" id="jours" name="jours" class="long"/>
               </td>
            </tr>
            <tr>
               <td>
                  <label>
                        Matricule <span class="required">*</span>
                  </label>
               </td>
               <td>
                  <!--<input type="text" id="mat" name="mat" class="long"/>  -->
                 
                  <select id="mat" type="text" name="mat">
                  <?php
                foreach($prix as $p)
                { ?>


                  
<option> <?php
                 echo $p['matricule']; ?> </option>
                 <?php
	
                }
	

    ?>
               </select>
               </td>
            </tr>
            <tr>
               <td></td>
               <td>
                  <input type="submit" id="submit" name="submit" value="Envoyer" onclick="verifier()">      
                  <input type="reset" value="Réinitialiser"> 
               </td>
            </tr>
         </table>
      </form>
      <a href="http://localhost/be/location/displayghayth.php"  style="color:black;">
                                            <i class="flaticon2-analytics-2"></i> Afficher mes reservations
                                        </a>
                                        <a href="http://localhost/be/location/displaycar2.php"  style="color:black;">
                                            <i class="flaticon2-analytics-2"></i> Afficherles voitures disponibles
                                        </a>
                                   
    </header>
   
    
    
    




    
      
	<!-- =============== jQuery =============== -->
    <script src="../assets/js/jquery.js"></script>
	 <script src="../assets/js/isotope-docs.min.js"></script>
   
    <!-- =============== Plugin JavaScript =============== -->
    <script src="../assets/js/jquery.easing.min.js"></script>
    <script src="../assets/js/jquery.fittext.js"></script>
    <script src="../assets/js/wow.min.js"></script> 
	

<script src="../assets/js/baguetteBox.js" async></script>
<script src="../assets/js/plugins.js" async></script>
 
    <!-- =============== Custom Theme JavaScript =============== -->
    <script src="../assets/js/creative.js">	</script> 
<script src="../assets/js/jquery.nicescroll.min.js"></script>




                                       
</body>
</html>