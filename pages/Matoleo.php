 <?php 
 include '../includes/connection.php';
include '../includes/header.php';
?>
<?php
session_start();
if (isset($_SESSION['role'])) {
	
}
else {
    echo "<script>alert('you need to login first');
    window.location.href='login.php';</script>";	
}

?>
<?php
$mess ="";
if (isset($_POST["savebtn"])) {
    $date = trim($_POST["Date"]);
    $sadaka = trim($_POST["Sadaka"]);
    $zaka = trim($_POST["Zaka"]);
	$shukrani = trim($_POST["Shukrani"]);
	$ahadi = trim($_POST["ahadi"]);
    $total = $sadaka + $zaka + $shukrani + $ahadi ;
	

    $sql = "INSERT INTO Matoleo(Date, Sadaka, Zaka, Shukrani, Ahadi, Total)VALUES('$date','$sadaka','$zaka','$shukrani ','$ahadi', '$total')";
    $result = mysqli_query($conn, $sql);
    if ($result) { 
	     $mess = "SUCCESSFULLY  SUBMITTED";
        
} else {
        $msg = "Failed to Submit";
        $_SESSION["error"] = $msg;
    }

}
?>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="../assets/img/Thanks.jpg" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">
			
			</h2>
			<span>
			
			MHAZINI DASHBOARD
			
			</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="#" class="brand-small text-center"> <strong class="text-warning">TA</strong><strong class="text-warning">G</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href= "userdashbord.php"> <i class="icon-home"></i>Home                             </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-edit"></i>TAARIFA </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                 <li><a href="Matoleo.php"> <i class="fa fa-edit"></i>WEKA TAARIFA ZA MATOLEO                          </a></li>
                 <li><a href="Matoleoview.php"> <i class="fa fa-edit"></i>ONA TAARIFA ZA MATOLEO                          </a></li>
              </ul>
            </li>
            <li><a href="Changepassword.php"> <i class="fa fa-refresh"></i>Change Password                            </a></li>
          </ul>
        </div>
      
      </div>
    </nav>
    <div class="page">
  <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="#" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span> </span><strong class="text-warning">TAG CHURCH</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
      
                <!-- Log out-->
                <li class="nav-item"><a href="../includes/logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
     
	   
	 	 <section class="forms">
        <div class="container">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">           </h1>
          </header>
          <div class="row">
      
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>WEKA TAARIFA ZA SIKU HUSIKA</h4>
                </div>
				<div style = "font-size:11px; color:green; margin-top:10px">
			    <center>
			  <?php echo $mess; ?>
			  </center>
			  </div>
				<div class="card-body">
  <form class="form-horizontal"  method="post">
               <div class="form-group row">
					 <div class="col-sm-2">
                        <label >Date *</label>
                      </div>
                      <div class="col-sm-5">
                        <input id="inputHorizontalSuccess" type="date" name="Date"  class="form-control form-control-success" required>
                      </div>
                    </div>
                    <div class="form-group row">
					 <div class="col-sm-2">
                        <label >Sadaka *</label>
                      </div>
                      <div class="col-sm-5">
                        <input id="inputHorizontalSuccess" type="number" name="Sadaka" placeholder="Sadaka Tsh /-" class="form-control form-control-success" required>
                      </div>
                    </div>
                    <div class="form-group row">
					<div class="col-sm-2">
                        <label >Zaka *</label>
                      </div>
                      <div class="col-sm-5">
                        <input id="inputHorizontalWarning" type="number" name="Zaka" placeholder="Zaka Tsh /-" class="form-control form-control-warning" required>
                      </div>
                    </div>
					 <div class="form-group row">
					 <div class="col-sm-2">
                        <label >Shukrani *</label>
                      </div>
                      <div class="col-sm-5">
                        <input id="inputHorizontalWarning" type="number" name="Shukrani" placeholder="Shukrani Tsh /-" class="form-control form-control-warning" required>
                      </div>
                    </div>
					 <div class="form-group row">
					 <div class="col-sm-2">
                        <label >Ahadi *</label>
                      </div>
                      <div class="col-sm-5">
                        <input id="inputHorizontalWarning" type="number" name="ahadi" placeholder="Ahadi Tsh /-" class="form-control form-control-warning" required>
                      </div>
                    </div>
					 <div style = "font-size:11px; color:red; margin-top:10px">
			    <center>
			 
			  </center>
			  </div>
					
                    
			    <div class="modal-footer ">
				<input name="savebtn" type="submit" class="btn btn-info" value="SUBMIT">
				</div>
					
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

	</form>
  
  
                </div>
				
              </div>
            </div>
			
          </div>
        </div>
      </section>
	   
	  
	   
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2020-2025</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">GasparMazima</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- JavaScript files-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="../assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="../assets/js/front.js"></script>
</html>
  </body>