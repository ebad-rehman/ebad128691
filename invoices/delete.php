<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from salesorder_12869 where InvoiceID='$id'");
		mysqli_query($conn,"delete from invoice_12869 where InvoiceID='$id'");
	}
	else if(isset($_POST['delitem'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from salesorder_12869 where InvoiceID='$id'");
	}
?>
