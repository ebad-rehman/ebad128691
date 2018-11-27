<?php 
include('connect.php');
	// initialize variable
	$SalesPersonID = "";
	$Name = "";
	$ContactNo = "";
        $ListOfCustomers = "";
        $update = false;

	if (isset($_POST['save'])) {

		$SalesPersonID = $_POST['SalesPersonID'];
		$Name = $_POST['Name'];
		$ContactNo = $_POST['ContactNo'];
                $ListOfCustomers = $_POST['ListOfCustomers'];




		mysqli_query($db, "INSERT INTO salesperson VALUES ('$SalesPersonID', '$Name', '$ContactNo', '$ListOfCustomers')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: indexsp.php');
	}

	if (isset($_POST['update'])) {
		
		$SalesPersonID = $_POST['SalesPersonID'];
		$Name = $_POST['Name'];
		$ContactNo = $_POST['ContactNo'];
                $ListOfCustomers = $_POST['ListOfCustomers'];

		mysqli_query($db, "UPDATE salesperson SET SalesPersonID = '$SalesPersonID', Name = '$Name', ContactNo = '$ContactNo', ListOfCustomers = '$ListOfCustomers' WHERE SalesPersonID='$SalesPersonID'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: indexsp.php');
	}

if (isset($_GET['del'])) {
	$SalesPersonID= $_GET['del'];
	mysqli_query($db, "DELETE FROM salesperson WHERE SalesPersonID='$SalesPersonID'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: indexsp.php');
}


	$results = mysqli_query($db, "SELECT * FROM salesperson");


?>