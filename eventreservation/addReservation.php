<?php session_start();
    include_once '../backoffice/eventReservation/Model/EventReservation.php';
    include_once '../backoffice/eventReservation/Controller/EventReservationController.php';

    $EventReservationController = new EventReservationController();
	$id = $_GET['id'];
	if(isset($_POST['event_reservation_lastname']) && isset($_POST['event_reservation_firstname']) && isset($_POST['event_reservation_email'])) {
        $EventReservation = new EventReservation($_POST['event_reservation_lastname'],$_POST['event_reservation_firstname'],$_POST['event_reservation_email']);
		$msg=$EventReservationController->addReservation($EventReservation,$id,$_POST['event_reservation_email']);
        if($msg!='Deja reserve')
        {
		    header('Location:../event/display.php');
        }else
        {   
           echo "<script>alert(\"Email Déja Reservé\")</script>";
        }
        
    }
?>

<!DOCTYPE html>
<!--
	Be by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Vite fait | Add Reservation</title>
		 
    <!-- =============== Bootstrap Core CSS =============== -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <!-- =============== fonts awesome =============== -->
    <link rel="stylesheet" href="../assets/font/css/font-awesome.min.css" type="text/css">
    <!-- =============== Plugin CSS =============== -->
    <link rel="stylesheet" href="../assets/css/animate.min.css" type="text/css">
    <!-- =============== Custom CSS =============== -->
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <!-- =============== Owl Carousel ../assets =============== -->
    <link href="../assets/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="../assets/owl-carousel/owl.theme.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- =============== Preloader =============== -->
    <div id="preloader">
          <div id="loading">
		<img width="256" height="32" src="../assets/img/loading-cylon-red.svg">
        </div>
    </div>
    <!-- =============== nav =============== -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="#contact">Reservation</a>
                        </li>
                    </ul>
                </div>
                <!-- =============== navbar-collapse =============== -->

            </div>
        </div>
        <!-- =============== container-fluid =============== -->
    </nav>
    <!-- =============== header =============== -->
    <header id="home" class="blog-header">
		<!-- =============== container =============== -->
        <div class="container">
            <div class="header-content row">
				<h1>EVENT </h1>
			</div>
        </div>
		<!-- =============== container end =============== -->
    </header>
    <!-- =============== blog single =============== -->
	<section id="contact">
	<!-- =============== container =============== -->
		<div class="container">
			    <div class="row">
                <div class="title">
				<h2>Reservation</h2>
				<p>Meet some of our lovely, passionate, positive people.</p>
				</div>
			</div>

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 wow bounceIn animated" data-wow-delay=".1s">

					<form  id="form-event" method="post">
						<div class="ajax-hidden">
							<div class="col-xs-12 col-sm-6 col-md-6 form-group wow fadeInUp animated">
								<label for="c_name" class="sr-only">LastName</label>
                                <input type="text" class="form-control" id="event-reservation-lastname" value="<?php echo $_SESSION['nom_verif'] ?>" name="event_reservation_lastname" placeholder="Enter your Last Name here">
                                <span class="form-text" id="lastname-eventreservation-error"></span>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group wow fadeInUp animated">
								<label for="c_name" class="sr-only">FirstName</label>
                                <input type="text" class="form-control" id="event-reservation-firstname" value="<?php echo $_SESSION['prenom_verif'] ?>" name="event_reservation_firstname" placeholder="Enter your First Name here">
                                <span class="form-text" id="firstname-eventreservation-error"></span>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group wow fadeInUp animated">
								<label for="c_email" class="sr-only">FirstName</label>
                                <input type="email" class="form-control" id="event-reservation-email" value="<?php echo $_SESSION['email_verif'] ?>" name="event_reservation_email" placeholder="Enter your First Name here">
                                <span class="form-text" id="email-eventreservation-error"></span>
                            </div>
							<button data-wow-delay=".3s" class="btn btn-sm btn-block wow fadeInUp animated" type="submit">Submit</button>
                            <button data-wow-delay=".3s" class="btn btn-sm btn-block wow fadeInUp animated" type="reset">Cancel</button>
						</div>
						<div class="ajax-response"></div>
					</form>
				</div>              
			</div>
		</div><!-- =============== container end =============== -->
	</section>
	
    

	
    <!-- Footer -->
    <footer id="footer" class="marg50">
	<!-- =============== container =============== -->
    <div class="container">
			    <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">

					<ul class="social-links">
						<li><a class="wow fadeInUp animated" href="index.html#" style="visibility: visible; animation-name: fadeInUp;"><i class="fa fa-facebook"></i></a></li>
						<li><a data-wow-delay=".1s" class="wow fadeInUp animated" href="index.html#" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;"><i class="fa fa-twitter"></i></a></li>
						<li><a data-wow-delay=".2s" class="wow fadeInUp animated" href="index.html#" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;"><i class="fa fa-google-plus"></i></a></li>
						<li><a data-wow-delay=".4s" class="wow fadeInUp animated" href="index.html#" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;"><i class="fa fa-pinterest"></i></a></li>
						<li><a data-wow-delay=".5s" class="wow fadeInUp animated" href="index.html#" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;"><i class="fa fa-envelope"></i></a></li>
					</ul>

                    <p class="copyright">
                        &copy; 2016 Be. Created By <a href="http://templatestock.co">Template Stock</a>
					</p>

				</div>
				<div data-wow-delay=".6s" class="col-xs-12 col-sm-6 col-md-6 wow bounceIn  animated" style="visibility: visible; animation-delay: 0.6s; animation-name: bounceIn;">

					  <section class="widget widget_text" id="text-15">
                         <h3 class="widget-title">California, United States</h3> <div class="textwidget">786, Firs Avenue, The Mall,<br>
                        <p>Tel: 01 234-56786<br>
                        Mobile: 01 234-56786<br>
                        E-mail: <a href="#">info@Be.com</a></p>
                        <a href="#">Get directions on the map</a> →</div>
                    </section>

				</div>
			</div>
    </div><!-- =============== container end =============== -->
	</footer>
    <!-- =============== jQuery =============== -->
    <script src="../assets/js/jquery.js"></script>
    <script src="addReservationjs.js" type="text/javascript"></script>
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
<script src="addReservationjs.js" type="text/javascript"></script>
</body>
</html>

