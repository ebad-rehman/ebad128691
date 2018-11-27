<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$InvoiceID=$_POST['InvoiceID'];
		$Date=$_POST['Date'];
		$CustomerID=$_POST['CustomerID'];
						
		if(!mysqli_query($conn,"insert into invoice_12869 values ('$InvoiceID', '$Date','$CustomerID')"))
			echo 'Failed to add. Make sure INVOICE ID is unique';
	}
	else if(isset($_POST['additem'])){
		$InvoiceID=$_POST['InvoiceID'];
		$ProductCode=$_POST['ProductCode'];
		$Quantity=$_POST['Quantity'];
		$Discount=$_POST['Discount'];
		if(!mysqli_query($conn,"insert into salesorder_12869(InvoiceID,ProductCode,Quantity,Discount) values ('$InvoiceID', '$ProductCode','$Quantity','$Discount')"))
			echo "Failed to add.";
	}
?>
