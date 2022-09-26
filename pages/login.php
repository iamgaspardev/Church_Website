 <?php 
include ('../includes/connection.php');
include '../includes/header.php';
include '../includes/loginprocess.php';
?>

  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>LOGIN HERE</span><strong class="text-warning">/INGIA HAPA</strong></div>
           
            <form method="post" class="text-left form-validate">
              <div class="form-group-material">
                <input id="login-username" type="text" name="username" required data-msg="Please enter your username" class="input-material"  placeholder="Enter Username">
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material"  placeholder="Enter Password">
              </div>
              <div class="form-group text-center">
			 <a href="../index.php"><input  type="button" class="btn btn-danger" value="BACK"></a>
                <input type="submit" name="login" value="LOGIN" class="btn btn-info">
              </div>
			  <div style = "font-size:11px; color:#cc0000; margin-top:10px">
			    <center>
			  <?php 
			  echo $error;		  
			  ?>
			  </center>
			  </div>
			  <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script> 
            </form><p href="#" class="forgot-pass" ><b>Forgot Password?</b></p><small> </small><a href="#" class="signup"></a>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>