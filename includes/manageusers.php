<?php

class Employee {
    protected $hostName;
    protected $userName;
    protected $password;
	protected $dbName;
	private $empTable = 'users';
	private $dbConnect = false;

	private function getData($sqlQuery) {
		$result = mysqli_query($conn, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($conn, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}   	
	public function employeeList(){		
		$sqlQuery = "SELECT * FROM ".$this->users." ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR firstname LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR middlename LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR Role LIKE "%'.$_POST["search"]["value"].'%" ';
				
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($conn, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$employeeData = array();	
		while( $employee = mysqli_fetch_assoc($result) ) {		
			$empRows = array();			
			$empRows[] = $employee['id'];
			$empRows[] = ucfirst($employee['firstname']);
			$empRows[] = $employee['middlename'];		
			$empRows[] = $employee['lastname'];	
			$empRows[] = $employee['username'];
			$empRows[] = $employee['Role'];					
			$empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$empRows[] = '<button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$employeeData[] = $empRows;
		}

		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$employeeData
		);
		echo json_encode($output);
	}
	
	
	public function updateEmployee(){
		if($_POST['empId']) {	
			$updateQuery = "UPDATE ".$this->users." 
			SET name = '".$_POST["empName"]."', age = '".$_POST["empAge"]."', skills = '".$_POST["empSkills"]."', address = '".$_POST["address"]."' , designation = '".$_POST["designation"]."'
			WHERE id ='".$_POST["empId"]."'";
			$isUpdated = mysqli_query($conn, $updateQuery);		
		}	
	}
	public function addEmployee(){
		$insertQuery = "INSERT INTO ".$this->users." (name, age, skills, address, designation) 
			VALUES ('".$_POST["empName"]."', '".$_POST["empAge"]."', '".$_POST["empSkills"]."', '".$_POST["address"]."', '".$_POST["designation"]."')";
		$isUpdated = mysqli_query($conn, $insertQuery);		
	}
	public function deleteEmployee(){
		if($_POST["empId"]) {
			$sqlDelete = "
				DELETE FROM ".$this->users."
				WHERE id = '".$_POST["empId"]."'";		
			mysqli_query($conn, $sqlDelete);		
		}
	}
}
?>