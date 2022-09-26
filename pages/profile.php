 <?php 
 include '../includes/connection.php';
include '../includes/header.php';
?>
<?php
session_start();
$mess ="";
if (isset($_POST["save"])) {
  
    $opass = md5($_POST["oldpassword"]);
	$pass = md5($_POST["password"]);
	 $repass = md5($_POST["repassword"]);
     $id = $_SESSION['id'];
    $sql = "UPDATE users SET password = '$pass' WHERE id='$id' AND password='$opass'";
    $result = mysqli_query($conn, $sql);
    if ($result) { 
	     $mess = "YOUR PASSWORD HAS BEEN CHANGED";
        
} else {
        $msg = "Failed to Register";
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
			<?php
				
				if(isset($_SESSION['name'])){
				echo ' '.$_SESSION['name'];
				}
				else{
					header("location:login.php");
				}
				?>
			</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="#" class="brand-small text-center"> <strong>G</strong><strong class="text-primary">S</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="userdashbord.php"> <i class="icon-home"></i>Home                             </a></li>
            <li><a href="profile.php"> <i class="icon-list"></i>View Profile                           </a></li>
            <li><a href="#"> <i class="fa fa-bar-chart"></i>My Duties                           </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Loan info </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">View Your Loan</a></li>
                <li><a href="#">Request Loan</a></li>
              </ul>
            </li>
            <li><a href="changepassword.php"> <i class="icon-interface-windows"></i>Change Password</a></li>
            <li> <a href="#"> <i class="icon-mail"></i>News
                <div class="badge badge-warning">6 New</div></a></li>
          </ul>
        </div>
      
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Mazima </span><strong class="text-primary">Company</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
           
                <!-- Languages dropdown    -->
                <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                  <ul aria-labelledby="languages" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="#" alt="English" class="mr-2"><span>German</span></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="#" alt="English" class="mr-2"><span>French                                                         </span></a></li>
                 </ul>
                </li>
                <!-- Log out-->
                <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
	  
	  	
	  	 <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">           </h1>
          </header>
          <div class="row">
      
            <div class="col-lg-12">
              <div class="card">
			  
                <div class="card-header d-flex align-items-center">
                  <h4>WELCOME TO YOUR PROFILE</h4>
                </div>
				
				<div class="card-body">
   <center>
                 			 <?php
          $id =$_SESSION['id'];
$result = mysqli_query($conn,"SELECT *FROM Users WHERE id='$id'");
while($row = mysqli_fetch_array($result))
{
      
        echo "<br /><b>First name:</b> ". $row['firstname'];
		echo "<br /><b>Middle name:</b> ". $row['middlename'];
		echo "<br /><b>Last name:</b> ". $row['lastname'];
        echo "<br /><b>Role:</b> ".$row['Role'];
      
}

?>
   </center>
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