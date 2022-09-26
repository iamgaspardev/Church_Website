<?php
session_start();

$role="";
$error="";
$erro="";
$mes="";
if (isset($_POST['login'])) {
  $username  = $_POST['username'];
  $password = md5($_POST['password']);

 $query = "SELECT * FROM users WHERE username = '$username' AND password='$password'";
 $result = mysqli_query($conn , $query) or die (mysqli_error($conn));
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
	  switch($row["Role"])
	  {
		 case("Admin"):
		       $_SESSION['role'] =$row["Role"];
		       header('location:../pages/Admin/Admin.php');
		       Break;
		 case("Mhazini"):
		      $_SESSION['role'] =$row["Role"];
		      header('location:../pages/userdashbord.php');
		      Break;
		 case("mzee wa kanisa"):
		      $_SESSION['role'] =$row["Role"];
		      header('location:../pages/mzee.php');
		      Break;
		 case("Mchungaji"):
		       $_SESSION['role'] =$row["Role"];
		       header('location:../pages/Admindashboard.php');
		       Break;
	  }
  }
}
    else 
	{
		$error = "Your Login Name or Password is invalid";
    }
}
?>