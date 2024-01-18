<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>EasyRental - Service</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Author" name="WebThemez">
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet"> 
</head>

<body id="body"> 
  <?php include('includes/header.php');?>
  <section id="innerBanner"> 
    <div class="inner-content">
      <h2><span>Nos Service</span><br>EasyRental votre satisfaction en un clic</h2>
      <div> 
      </div>
    </div> 
  </section><!-- #Page Banner -->

  <main id="main">
    <section id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
         
          <p>EasyRental vous offre la possibilité de louer la voiture ou bien la moto que vous souhaitez avoir,et même d'avoir un chauffeur personnel.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="admin/img/vehicleimages/listing_img3.jpg" class="portfolio-popup">
                <img src="admin/img/vehicleimages/listing_img3.jpg" style=" height: 194px;" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">voitures</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="admin/img/bikeimages/1.jpg" class="portfolio-popup">
                <img src="admin/img/bikeimages/1.jpg" style=" height: 194px;" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Motos</h2></div>
                </div>
              </a>
            </div>
          </div>

         

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="admin/img/driverimages/logoeasy.png" class="portfolio-popup">
                <img src="admin/img/driverimages/logoeasy.png" style=" height: 194px;" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">EasyRental</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="admin/img/driverimages/chauffeur.jpg" class="portfolio-popup">
                <img src="admin/img/driverimages/chauffeur.png" style=" height: 194px;" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Chauffeur</h2></div>
                </div>
              </a>
            </div>
          </div>


        </div>

      </div>
    </section><!-- #portfolio -->
    

  </main>

  <!--==========================
    Footer
    ============================-->
    <?php include('includes/footer.php');?><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript  -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/magnific-popup/magnific-popup.min.js"></script>
    <script src="lib/sticky/sticky.js"></script> 
    <script src="contact/jqBootstrapValidation.js"></script>
    <script src="contact/contact_me.js"></script>
    <script src="js/main.js"></script>

  </body>
  </html>
