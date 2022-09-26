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
		$stmt = $conn->prepare("insert into users(firstname, middlename, lastname, email, phone, password, Role)")values(?,?,?,?,?,?,?);
		$stmt->bind_param("sssssss",$fname,$mname,$lname,$username,$phone,$password,$role);
		$stmt->execute();
		echo "registration sucessfull"
		$stmt->close();
		$conn->close();
		
	}
?>