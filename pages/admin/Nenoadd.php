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
    window.location.href='../login.php';</script>";	
}

?>
<?php
$mess ="";
if (isset($_POST["neno_btn"])) {
    $name = trim($_POST["name"]);
    $message = trim($_POST["message"]);
     $kichwa = trim($_POST["kichwa"]);   
    $sql = "INSERT INTO neno(Name, Mafundisho, kichwa_somo)VALUES('$name','$message','$kichwa')";
    $result = mysqli_query($conn, $sql);
    if ($result) { 
	     $mess = "SUCCESSFULLY UPLOADED";
        
} else {
        $msg = "Failed to Upload";
        $_SESSION["error"] = $msg;
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
            <li><a href="Admin.php"> <i class="icon-home"></i>Home                             </a></li>
			 <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-edit"></i>MAFUNDISHO </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="Nenoadd.php">Neno</a></li>
				<li><a href="#">Futa neno</a></li>
                <li><a href="seminaupload.php">Semina </a></li>
              </ul>
            </li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user"></i>Users </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="Addusers.php">Add Users </a></li>
                <li><a href="updateusers.php">Manage Users </a></li>
              </ul>
            </li>
			
            <li><a href="changepasswd.php"> <i class="fa fa-refresh"></i>Change Password                            </a></li>
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
                <li class="nav-item"><a href="../logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
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
                  <h4>WEKA MAFUNDISHO HAPA
				  </h4>
                </div>
				<div style = "font-size:11px; color:green; margin-top:10px">
			    <center>
			  <?php echo $mess; ?>
			  </center>
			  </div>
				<div class="card-body">
     <form class="text-center border border-light p-5" method="post" >
	           <div class="form">
         
            <div class="form-group">
              <input type="text" class="form-control" name="name" id="subject" placeholder="Jina La Mtoa Mafundisho Eg. Mwl /Askofu Dr DONALD MWANJOKA" data-rule="minlen:4" required  />
              <div class="validate"></div>
            </div>
			<div class="form-group">
              <input type="text" class="form-control" name="kichwa" id="subject" placeholder="Weka kichwa cha Somo" data-rule="minlen:4" required  />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Weka Mafundisho Hapa" required></textarea>
              <div class="validate"></div>
            </div>
			<div class="modal-footer ">
				<input name="neno_btn" type="submit" class="btn btn-info" value="UPLOAD">
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