<?php 

include('connect.php');
	// initialize variable
	$UserID = "";
	$Password = "";
	$Active = "";
        $SalesPerson = "";
	$update = false;

	if (isset($_POST['save'])) {

		$UserID = $_POST['UserID'];
		$Password = $_POST['Password'];
                $Active = $_POST['Active'];
		$SalesPerson = $_POST['SalesPerson'];




		mysqli_query($db, "INSERT INTO users_12869 VALUES ('$UserID', '$Password', '$Active', '$SalesPerson')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: indexu.php');
	}

	if (isset($_POST['update'])) {
		
		$UserID = $_POST['UserID'];
		$Password = $_POST['Password'];
                $Active = $_POST['Active'];
		$SalesPerson = $_POST['SalesPerson'];



		mysqli_query($db, "UPDATE users_12869 SET UserID = '$UserID', Password = '$Password', Active = '$Active', SalesPerson = '$SalesPerson' WHERE UserID='$UserID'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: indexu.php');
	}

if (isset($_GET['del'])) {
	$UserID = $_GET['del'];
	mysqli_query($db, "DELETE FROM users_12869 WHERE UserID='$UserID'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: indexu.php');
}


	$results = mysqli_query($db, "SELECT * FROM users_12869");


?>