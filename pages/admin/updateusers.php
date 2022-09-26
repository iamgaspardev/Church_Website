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
			
            <li class="nav-item"><a href="../logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
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
                  
                </div>
				
				<div class="card-body">
    
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="container contact">	
		
	
	<?php if($_SESSION['role'] == 'Admin')  
{ 
}
	?>
	 <div id="wrapper">


        <div id="page-wrapper">

            <div class="container-fluid">

                
                <div class="row">
                    <div class="col-lg-12 ">

                        
                        <h4>USER MANAGEMENT HERE</h4>



    <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Middlename</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Role</th>
            <th>Edit</th>
			<th>Delete</th>
        </tr>
    </thead>

    <tbody>
        
        <?php 
            
            $query = "SELECT * FROM users";
            $select_users = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_users) > 0 ) {
            while ($row = mysqli_fetch_array($select_users)) {
                $user_id = $row['id'];
                $fname = $row['firstname'];
                $mname = $row['middlename'];
                $lname = $row['lastname'];
                $username = $row['username'];
                $role = $row['Role'];
                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td> $fname</td>";
                echo "<td>$mname</td>";
                echo "<td>$lname</td>";
                echo "<td>$username</td>";
                echo "<td>$role</td>";
			
                echo "<td ><a href='#editEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons ' style= 'color:orange' data-toggle='tooltip'  title='Edit'>&#xE254;</i></a></td>";
			  echo "<td><a  href='updateusers.php?delete=$user_id'style= 'color:red'class='delete'><i class='material-icons'style= 'color:red'  data-toggle='tooltip'title='Delete'>&#xE872;</i></a></td>";
			  echo "</tr>";
             }
        ?>

    </tbody>
 </table>

<?php 
}

    if (isset($_GET['delete'])) {
        $the_user_id = mysqli_real_escape_string($conn , $_GET['delete']);
        $query0 = "SELECT * FROM users WHERE id = '$the_user_id'";
        $result = mysqli_query($conn , $query0) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0 ) {
            $row = mysqli_fetch_array($result);
            $id1 = $row['Role'];
        }
        if ($id1 == 'Admin') {
            echo "<script>alert('admin cannot be deleted');</script>";
        }
        else {

        $query = "DELETE FROM users WHERE id = '$the_user_id'";

        $delete_query = mysqli_query($conn, $query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0 ) {
            echo "<script>
            window.location.href= 'updateusers.php';</script>";
        }
        else {
        	 echo "<script>alert('error');
            window.location.href= 'updateusers.php';</script>";
        }
    }
}
 if (isset($_POST['edit'])) {
	 $ms = "";
		$_POST['edit']= $user_id;
        $the_user_id = mysqli_real_escape_string($conn , $_POST['edit']);
        $query0 = "SELECT * FROM users WHERE id = '$the_user_id'";
        $result = mysqli_query($conn , $query0) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0 ) {
            $row = mysqli_fetch_array($result);
            $id1 = $row['Role'];
			$pasw = $row['lastname'];
			$pss = strtoupper($pasw);
			$new = md5($pss);
        }
        if ($id1 == 'Admin') {
            echo "<script>alert('admin cant be changed');</script>";
        }
        else {

        $query = "UPDATE users SET password = '$new' WHERE id = '$the_user_id'";

        $delete_query = mysqli_query($conn, $query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0 ) {
     echo "<script>alert('Reset successfully');
            window.location.href= 'updateusers.php';</script>";
        }
        else {
        	 echo "<script>alert('error');
            window.location.href= 'updateusers.php';</script>";
        }
    }
}
    ?>
	
	<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>


    </div>
    </div>
    </div>
    </div>

    </div>

</div>	
		</div>
	</div>
	<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">						
					<h4 class="modal-title">RESET USER PASSWORD</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
                   <p>User will Use lastname as default Password !</p>
					<p class="text-warning"><small>This must be in capital leter.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input name="edit" type="submit" class="btn btn-info" value="CLICK TO RESET">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->

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
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input name="delete" type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
	
	
	
                </div>
				
              </div>
            </div>
			
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