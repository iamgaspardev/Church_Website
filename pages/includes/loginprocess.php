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
	  if($row["Role"] == "Mchungaji")
	  {
		  $_SESSION['user'] =$row["username"];
		  $_SESSION['role'] =$row["Role"];
		    $_SESSION['id'] =$row["id"];
			 $_SESSION['name'] =$row["firstname"];
		  header('location:../pages/Admindashboard.php');
	  }
	  else if($row["Role"] == "Admin")
	  {
		  	$_SESSION['user'] =$row["username"];
			  $_SESSION['role'] =$row["Role"];
			   $_SESSION['id'] =$row["id"];
			   $_SESSION['name'] =$row["firstname"];
		  	header('location:../pages/Admin/Admin.php');
	  }
	  else if($row["Role"] == "Mhazini")
	  {
		  	$_SESSION['user'] =$row["username"];
			  $_SESSION['role'] =$row["Role"];
			   $_SESSION['id'] =$row["id"];
			   $_SESSION['name'] =$row["firstname"];
		  	header('location:../pages/userdashbord.php');
	  }
	  else 
	  {
		  	$_SESSION['user'] =$row["username"];
			  $_SESSION['role'] =$row["Role"];
			   $_SESSION['id'] =$row["id"];
			   $_SESSION['name'] =$row["firstname"];
		  	header('location:../pages/mzee.php');
	  }
    }
	 }
    else 
	{
		$error = "Your Login Name or Password is invalid";
    }
}
?>