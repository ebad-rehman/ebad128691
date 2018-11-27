<?php
	include('conn.php');
	if(isset($_POST['searchprod'])){
		$ProductCode=$_POST['ProductCode'];
		$query = mysqli_query($conn, "SELECT * FROM product WHERE ProductCode = '$ProductCode'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
	else if(isset($_POST['search'])){
		$CustomerID=$_POST['CustomerID'];
		$query = mysqli_query($conn, "SELECT * FROM customer_12869 WHERE CustomerID = '$CustomerID'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
?>

