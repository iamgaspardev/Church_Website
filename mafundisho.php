 <?php

include 'includes/connection.php';
require('includes/connection.php');
//include '../includes/navbar.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KKKT | MBEYA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizPage - v3.1.1
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-11 d-flex align-items-center">
          <h1 class="logo mr-auto"><a href="index.php">KKKT MBEYA</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              	<li><a class="btn btn-success"href="index.php">Home</a></li>
				 <li class="drop-down"><a href="">IBADA </a>
                <ul>
                  <li><a href="mafundisho.php">NENO</a></li>
                  <li><a href="#">SEMINA</a></li>
                  <li><a href="#">MIKUTANO</a></li>
                  <li><a href="Ratiba.php">RATIBA ZETU</a></li>
                </ul>
              </li>
						<li><a href="#">Videos</a></li>
						<li><a href="contact.php">Contact Us</a></li>
						<li><a href="about.php">About Us</a></li>
						<li ><a href="pages/login.php" > Login<i class="fa fa-sign-in"></i></a></li>
            </ul>
          </nav><!-- .nav-menu -->
        </div>
      </div>

    </div>
  </header><!-- End Header -->
 <!-- ======= Intro Section ======= -->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(assets/img/intro-carousel/1.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">KANISA LA KIINJILI LA KIRUTHERI TANZANIA</h2>
				<h4 class="animate__animated animate__fadeInDown"><strong class="text-success">KKKT MBEYA</strong></h4>
                <p class="animate__animated animate__fadeInUp">Karibu katika huduma ya neno la Mungu....!</p>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/intro-carousel/2.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">KANISA LA KIINJILI LA KIRUTHERI TANZANIA</h2>
				<h4 class="animate__animated animate__fadeInDown"><strong class="text-success">KKKT MBEYA</strong></h4>
                <p class="animate__animated animate__fadeInUp">Karibu katika huduma ya neno la Mungu....!</p>
            </div>
            </div>
          </div>
		  
        </div>

         <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>


      </div>
    </div>
  </section><!-- End Intro Section -->


  <main id="main">
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>KARIBU MAFUNDISHO YA NENO LA MUNGU</h3>
        </header>

        <div class="row about-cols">

        <?php 
            
            $query = "SELECT * FROM Neno";
            $select_users = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_users) > 0 ) {
            while ($row = mysqli_fetch_array($select_users)) {
                $name = $row['Name'];
				$kichwa = $row['Kichwa_somo'];
                $messg = $row['Mafundisho'];
                
                echo "<tr>";
				
				echo "<br>";
				echo "<center>";
				echo "<td>$kichwa</td>";
				echo "</center>";
				echo "<br>";
                echo "<td> $messg</td>";
				echo "<br>";
				echo "<br>";
				echo "Limeandaliwa Na :   ";
                echo "<td>$name</td>";
				echo "<br>";
				echo "</tr>";
             }
			}
        ?>

        </div>

      </div>
    </section>

    <!-- ======= About Us Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>UNGANA NASI ZAIDI </h3>
        </header>

        <div class="row about-cols">

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="about-col">
              <div class="img">
				<img src="assets/img/b.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Praise and Worship</a></h2>
              <p>Ibada za kusifu na kuabudu </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/a.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-view-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Ibada</a></h2>
              <p>Ibada zetu za kila siku</p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/c.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Mikutano</a></h2>
              <p>Mikutano na semina Za Neno la Mungu</p>
            </div>
          </div>

        </div>

      </div>
    </section>
	<!-- End About Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2020-2025</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="#" class="external">GasparMazima</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>