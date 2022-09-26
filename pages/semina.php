 <?php
include '../includes/header.php';
include '../includes/connection.php';
require('../includes/connection.php');
//include '../includes/navbar.php';

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
$msg = "";
if(isset($_POST['Upload']))
{
	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "image/".$filename;
	
	$sql = "INSERT INTO Semina VALUES ('$filename')";
	mysqli_query($conn,$sql);
	if(move_uploaded_file($tempname,$folder))
	{
		$msg = "Image uploaded";
	}
	else{
		$result = "Failed to upload";
	}
}
?>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
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
			Welcome Admin
			</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
 <div class="sidenav-header-logo"><a href="#" class="brand-small text-center"> <strong class="text-warning">TA</strong><strong class="text-warning">G</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
              <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="Admindashboard.php"> <i class="icon-home"></i>Home                             </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-edit"></i>MAFUNDISHO </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="Neno.php">Neno</a></li>
                <li><a href="semina.php">Semina </a></li>
              </ul>
            </li>
			<li><a href="Taarifa.php"> <i class="fa fa-bars"></i>TAARIFA  SADAKA                       </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user"></i>Users </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="Adduser.php">Add Users </a></li>
                <li><a href="updateuser.php">Manage Users </a></li>
              </ul>
            </li>
			
            <li><a href="Changepasswords.php"> <i class="fa fa-refresh"></i>Change Password                            </a></li>
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
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">           </h1>
          </header>
          <div class="row">
      
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>WEKA PICHA YA TANGAZO LA SEMINA
				  </h4>
                </div>
				
				<div class="card-body">
     <form class="text-center border border-light p-5" method="post" >
			      <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="uploadfile" id="file" size="150">
			<p class="text-warning"><small>Only JPG/PNG File Import.</small></p>
       
    </div>
    <button type="submit" class="btn btn-default" name="upload" value="submit">Upload</button>
			  
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
	
	 <section class="forms">
        <div class="container-fluid">
    
        </div>
         
        </div>
      </section>
	

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