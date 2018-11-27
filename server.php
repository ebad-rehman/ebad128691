<?php 
include('connect.php');
	// initialize variable
	$CustomerID = "";
	$ShopName = "";
	$ContactPerson = "";
	$ContactNo = "";
    $Address = "";
    $Area = "";
    $GeoCord = "";
    $SalesPersonID = "";
	
	$update = false;

	if (isset($_POST['save'])) {

		$CustomerID = $_POST['CustomerID'];
		$ShopName = $_POST['ShopName'];
                $ContactPerson = $_POST['ContactPerson'];
		$ContactNo = $_POST['ContactNo'];
                $Address = $_POST['Address'];
                $Area = $_POST['Area'];
				$GeoCord = $_POST['GeoCord'];
                $SalesPersonID = $_POST['SalesPersonID'];




		mysqli_query($db, "INSERT INTO customer_12869 VALUES ('$CustomerID', '$ShopName', '$ContactPerson', '$ContactNo', '$Address', '$Area', '$GeoCord', '$SalesPersonID')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: index.php');
	}

	if (isset($_POST['update'])) {
		
		$CustomerID = $_POST['CustomerID'];
		$ShopName = $_POST['ShopName'];
                $ContactPerson = $_POST['ContactPerson'];
		$ContactNo = $_POST['ContactNo'];
                $Address = $_POST['Address'];
                $Area = $_POST['Area'];
				$GeoCord = $_POST['GeoCord'];
                $SalesPersonID = $_POST['SalesPersonID'];

		mysqli_query($db, "UPDATE customer_12869 SET CustomerID = '$CustomerID', ShopName = '$ShopName', ContactPerson = '$ContactPerson', ContactNo = '$ContactNo', Address = '$Address', Area = '$Area', GeoCord = '$GeoCord', SalesPersonID = '$SalesPersonID' WHERE CustomerID='$CustomerID'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: index.php');
	}

if (isset($_GET['del'])) {
	$CustomerID = $_GET['del'];
	mysqli_query($db, "DELETE FROM customer_12869 WHERE CustomerID='$CustomerID'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: index.php');
}


	$results = mysqli_query($db, "SELECT * FROM customer_12869");


?>