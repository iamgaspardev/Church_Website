<?php
    $fname = trim($_POST["FirstName"]);
    $mname = trim($_POST["MiddleName"]);
    $lname = trim($_POST["LastName"]);
	$username = trim($_POST["email"]);
	$phone = trim($_POST["phone"]);
    $password = md5($_POST["password"]);
	$role = trim($_POST["role"]);
	$conn = new mysqli('localhost','root','','Mazimadb');
	if($conn->connect_error){
		die('connection failed :'.$conn->connect_error);
	}else
	{
		$sql = "INSERT INTO users(firstname, middlename, lastname, email, phone, password, Role)VALUES('$fname','$mname','$lname','$username ','$phone','$password', '$role')";
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