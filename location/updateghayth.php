<?php
    include_once '../Model/Reservation.php';
    include_once '../Controller/ReservationC.php';

    /*$error = "";

    // create adherent
    $reservation = null;

    // create an instance of the controller
    $reservationC = new ReservationC();
    $code=$_GET['code'];
    $reservation=ReservationC->recupererreservation($code);

    if (
        isset($_POST["code"]) &&
		isset($_POST["date"]) &&		
        isset($_POST["jours"]) &&
		isset($_POST["prix"]) 
    ) {
        if (
            !empty($_POST["code"]) && 
			!empty($_POST['date']) &&
            !empty($_POST["jours"]) && 
			!empty($_POST["prix"]) 
            
        ) {
            $reservation = new reservation(
                $_POST['code'],
				$_POST['date'],
                $_POST['jours'], 
				$_POST['prix']
            );
            $reservationC->modifierreservation($reservation,$code);
            
        }
        else
            $error = "Missing information";
    }*/
    $ReservationC = new ReservationC();
	//$code = $_GET['code'];
	$reservation = $ReservationC->recupererreservation($_GET['code']);
	if(isset($_POST['date']) && isset($_POST['jours']) && isset($_POST['prix'])) {
        $reservation = new reservation($_POST['date'],$_POST['jours'],$_POST['prix']);
        $ReservationC->modifierreservation($reservation,$_GET['code']);
        
	}
    
?>
 





<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Modification d'une réservation</title>

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
    


        
   

        
    <center><h2>Réservation</h2></center>
         <form action="" method="POST">
      
         <table >
            
            <!--<tr>
               <td>
                  <label>
                     Date de debut <span class="required">*</span>
                  </label>
               </td>
               <td>
                  <input type="text" id="date" name="date" value="<?php //echo $reservation['datee']; ?>" class="long"/>
                  
               </td>
            </tr>-->
            <tr>
               <td>
                  <label>
                        Nombre de jours <span class="required">*</span>
                  </label>
               </td>
               <td>
                  <input type="number" id="jours" name="jours" value="<?php echo $reservation['jours']; ?>" class="long"/>
               </td>
            </tr>
            <tr>
               <td>
                  <label>
                        Prix <span class="required">*</span>
                  </label>
               </td>
               <td>
                  <input type="number" id="prix" name="prix" value="<?php echo $reservation['prix']; ?>" class="long"/>
               </td>
            </tr>
            <tr>
               <td></td>
               <td>
                  <input type="submit" id="submit" name="submit" value="Modifier">      
                  <input type="reset" value="Annuler"> 
               </td>
            </tr>
         </table>
      </form>
     
    </header>
   
    
    <!--My js: Probleme de l'adresse : reserv.js !!!-->
    <script >
    function verifier()
{

if(document.getElementById("jours").value>100)
    alert('Le nombre des jours est faux!');
    
    /*var today = new Date();
        var dateNais =new Date(document.getElementById("date").value) ;
        if (today< dateNais) 
        {alert('True date');
            
        }


        else 
         {
             alert('False Date'); 

            }*/
}

var b=document.getElementById('submit');
b.addEventListener('click',verifier);
    </script>




    
      
	<!-- =============== jQuery =============== -->
    <script src="../assets/js/jquery.js"></script>
	 <script src="../assets/js/isotope-docs.min.js"></script>
    <!-- =============== Bootstrap Core JavaScript =============== -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- =============== Plugin JavaScript =============== -->
    <script src="../assets/js/jquery.easing.min.js"></script>
    <script src="../assets/js/jquery.fittext.js"></script>
    <script src="../assets/js/wow.min.js"></script> 
	<!-- =============== owl carousel =============== -->
    <script src="../assets/owl-carousel/owl.carousel.js"></script>  
	<!-- Isotope does NOT require jQuery. But it does make things easier -->

<script src="../assets/js/baguetteBox.js" async></script>
<script src="../assets/js/plugins.js" async></script>
 
    <!-- =============== Custom Theme JavaScript =============== -->
    <script src="../assets/js/creative.js">	</script> 
<script src="../assets/js/jquery.nicescroll.min.js"></script>
<!--Template js-->
<script>
  $(document).ready(function() {
  
	var nice = $("html").niceScroll();  // The document page (body)
	
	$("#div1").html($("#div1").html()+' '+nice.version);
    
    $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#00F",boxzoom:true}); // First scrollable DIV

    $("#boxscroll2").niceScroll("#contentscroll2",{cursorcolor:"#F00",cursoropacitymax:0.7,boxzoom:true,touchbehavior:true});  // Second scrollable DIV
    $("#boxframe").niceScroll("#boxscroll3",{cursorcolor:"#0F0",cursoropacitymax:0.7,boxzoom:true,touchbehavior:true});  // This is an IFrame (iPad compatible)
	
    $("#boxscroll4").niceScroll("#boxscroll4 .wrapper",{boxzoom:true});  // hw acceleration enabled when using wrapper
    
  });
</script>
<!--Template js-->
<script> 

window.onload = function() {
    if(typeof oldIE === 'undefined' && Object.keys)
        hljs.initHighlighting();

    baguetteBox.run('.baguetteBoxOne');
    baguetteBox.run('.baguetteBoxTwo');
    baguetteBox.run('.baguetteBoxThree', {
        animation: 'fadeIn'
    });
    baguetteBox.run('.baguetteBoxFour', {
        buttons: false
    });
    baguetteBox.run('.baguetteBoxFive', {
        captions: function(element) {
            return element.getElementsByTagName('img')[0].alt;
        }
    });
};
</script>
</body>
</html>