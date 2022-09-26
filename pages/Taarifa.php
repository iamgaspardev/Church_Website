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
      
            <div class="col-md-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>TAARIFA FUPI KUTOKA KWA MUHAZINI
				  </h4>
                </div>
				
				<div class="card-body">
   <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Sadaka</th>
            <th>Zaka</th>
            <th>Shukrani</th>
            <th>Ahadi</th>
            <th>Total</th>
			<th>Delete</th>
        </tr>
    </thead>

    <tbody>
        
        <?php 
            
            $query = "SELECT * FROM Matoleo";
            $select_users = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_users) > 0 ) {
            while ($row = mysqli_fetch_array($select_users)) {
                $user_id = $row['M_ID'];
                $fname = $row['Date'];
                $mname = $row['Sadaka'];
                $lname = $row['Zaka'];
                $username = $row['Shukrani'];
                $role = $row['Ahadi'];
				$total = $row['Total'];
                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td> $fname</td>";
                echo "<td>$mname</td>";
                echo "<td>$lname</td>";
                echo "<td>$username</td>";
                echo "<td>$role</td>";
			    echo "<td>$total</td>";
				 echo "<td><a  href='Taarifa.php?delete=$user_id'style= 'color:red'class='delete'><i class='material-icons'style= 'color:red'  data-toggle='tooltip'title='Delete'>&#xE872;</i></a></td>";
			 echo "</tr>";
             }
			}
        ?>

    </tbody>
 </table>
				<?php 
    if (isset($_GET['delete'])) {
        $the_user_id = mysqli_real_escape_string($conn , $_GET['delete']);
           $query = "DELETE FROM matoleo WHERE M_ID = '$the_user_id'";

        $delete_query = mysqli_query($conn, $query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0 ) {
            echo "<script>
            window.location.href= 'Taarifa.php';</script>";
        }
        else {
        	 echo "<script>alert('error');
            window.location.href= 'Taarifa.php';</script>";
        }
}
?>
                </div>
				
              </div>
			  
            </div>
			
          </div>
        </div>
      </section>
	
	<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Delete User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-default"><small>This action can not be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input name="delete" type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
	
	
	 
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