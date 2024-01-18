<header id="header">
  <div class="container">

    <div id="logo" class="pull-left">
     <h1><a href="index.php"><span style="color: #49a3ff;;">Easy</span>Rental</a></h1>
   </div>
   <div class="pull-left ml-4">
    <!-- SEARCH FORM -->
    <form class="form-inline "  action="search.php" method="post">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="text"  name="searchdata" placeholder="Search Car" aria-label="Search" required="true" style="height: 30px;">
        <div class="input-group-append">
          <button class="btn btn-navbar" style="background-color: #49a3ff;" type="submit">
           <span style="color: #FFFFFF;"> <i class="fa fa-search"></i></span>
         </button>
       </div>
     </div>
   </form>
 </div>


 <nav id="nav-menu-container">
  <ul class="nav-menu">
    <li class="menu-active"><a href="index.php">Home</a></li>
    <li><a href="car_list.php">Car list</a></li>
    <li><a href="bike.php">Book Bike</a></li>
    <li><a href="driver.php">Hire Driver</a></li>
    <li><a href="portfolio.php">Gallery</a></li>
    <li class="menu-has-children"><a href="">Pages</a>
      <ul>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        
      </ul>
    </li>
    <li class="menu-has-children"><a href="">Language</a>
    <ul>
        <li><a href="../index.php">Français</a></li>
        <li><a href="index.php">English</a></li>
        
      </ul>
    <?php   if(strlen($_SESSION['login'])!=0)
    { 
      ?>
      <?php 
      $email=$_SESSION['login'];
      $sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
      $query= $dbh -> prepare($sql);
      $query-> bindParam(':email', $email, PDO::PARAM_STR);
      $query-> execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      if($query->rowCount() > 0)
      {
        foreach($results as $result)
        {
          ?>
          <li class="menu-has-children"><a href=""><?php echo htmlentities($result->FullName);?></a>
            <ul>
              <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update_password.php">Update Password</a></li>
              <li><a href="my_booking.php">My Booking</a></li>
              <li><a href="logout.php">Sign Out</a></li>
            </ul>
          </li>
          <?php 
        }
      }
    }else{

    } ?>
  </ul>
</nav><!-- #nav-menu-container -->
</div>
  </header><!-- #header -->