<?php 
include('connect.php');
	// initialize variable
	$ProductCode = "";
	$Brand = "";
	$Type = "";
	$Shade = "";
        $Size = "";
        $SalesPrice = "";
	$update = false;

	if (isset($_POST['save'])) {

		$ProductCode = $_POST['ProductCode'];
		$Brand = $_POST['Brand'];
                $Type = $_POST['Type'];
		$Shade = $_POST['Shade'];
                $Size = $_POST['Size'];
                $SalesPrice = $_POST['SalesPrice'];




		mysqli_query($db, "INSERT INTO product VALUES ('$ProductCode', '$Brand', '$Type', '$Shade', '$Size', '$SalesPrice')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: indexp.php');
	}

	if (isset($_POST['update'])) {
		
		$ProductCode = $_POST['ProductCode'];
		$Brand = $_POST['Brand'];
                $Type = $_POST['Type'];
		$Shade = $_POST['Shade'];
                $Size = $_POST['Size'];
                $SalesPrice = $_POST['SalesPrice'];

		mysqli_query($db, "UPDATE product SET ProductCode = '$ProductCode', Brand = '$Brand', Type = '$Type', Shade = '$Shade', Size = '$Size', SalesPrice = '$SalesPrice' WHERE ProductCode='$ProductCode'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: indexp.php');
	}

if (isset($_GET['del'])) {
	$ProductCode = $_GET['del'];
	mysqli_query($db, "DELETE FROM product WHERE ProductCode='$ProductCode'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: indexp.php');
}


	$results = mysqli_query($db, "SELECT * FROM product");


?>