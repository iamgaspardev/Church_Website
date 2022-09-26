
<?php
include '../includes/header.php';
include '../includes/connection.php';
include '../includes/navbar.php';

?>
<?php
if (isset($_POST["submit_btn"])) {
    $fname = trim($_POST["FirstName"]);
    $mname = trim($_POST["MiddleName"]);
    $lname = trim($_POST["LastName"]);
	$phone = trim($_POST["phone"]);
	$username = trim($_POST["username"]);
    $password = md5($_POST["password"]);
	$role = trim($_POST["role"]);
	

    $sql = "INSERT INTO users(firstname, middlename, lastname, username, password, Role)VALUES('$fname','$mname','$lname','$username ','$password', '$role')";
    $result = mysqli_query($conn, $sql);
    if ($result) { 
        echo "<script>alert('SUCCESSFULLY REGISTERED');
        window.location.href='Register.php';</script>";
} else {
        $msg = "Failed to Register";
        $_SESSION["error"] = $msg;
    }

}
?>
 <link rel="stylesheet" href="../asset/bootstrap/bootstrap.min.css">
<style>
#gasperLogin{
	    border: 1px solid #76C7F9;
        border-radius: 20px;
        padding: 50px 10px 40px 10px;
}
</style>
<body>
<div class="container">

<div  class="form">
        <form id="contactform" action="" method="POST"> 
    <div class="row" style="margin-top: 5em;">
        <div class="col-md-4" >
            </div>
			<div class="col-md-4" id="gasperLogin" style="background-color:#DFE9FB">
			<div class="card-title bg-primary text-white mt-2">
			<h3 class="text-center py-2">Sign Up</h3>
			 </div>
                        <div class="form-group">
                            <input type="text" name="FirstName" class="form-control" placeholder="Enter firstName" required>
                        </div>
                        <div class="form-group" style="margin-top:20px">
                            <input type="text" name="MiddleName" class="form-control" placeholder="Enter MiddleName" required>
                        </div>
                          <div class="form-group" style="margin-top:20px">
                            <input type="text" name="LastName" class="form-control" placeholder="Enter LastName" required>
                        </div>  
						<div class="form-group" style="margin-top:20px">
                            <input type="text" name="username" class="form-control" placeholder="username" required>
                        </div> 
						<div class="form-group" style="margin-top:20px">
                           <input type="password" name="password" class="form-control" placeholder="password" required>
                        </div>
						<div class="form-group" style="margin-top:20px">
                           <input type="text" name="role" class="form-control" placeholder="Enter role" required>
                        </div>
						 <div class="col-md-4" >
						  <button type="submit" name="submit_btn" class="btn btn-success btn-block">SUBMIT</button>
                         </div>
                    <p>Already I have an account <a href="login.php">Login</a></p>
            </div>
			<div class="col-md-4 ">
            </div>
               </div>
			   </form>
			   </div>
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
			
</body>
</html>