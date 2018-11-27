<?php
	include('conn.php');
	$CustomerID = $_POST['searchid'];
	$sql = "SELECT * FROM invoice_12869 WHERE CustomerID = '$CustomerID'";
	$result = mysqli_query($conn, $sql);
	echo "<label>INVOICE ID</label>";
	echo "<select type = 'text' id = 'searchInvoiceID' class = 'form-control' name='CustomerID'>";
	echo "<option value= ''>SELECT INVOICE</option>";
	while ($row = mysqli_fetch_array($result)) {
	echo "<option value='" . $row['InvoiceID'] ."'>" . $row['InvoiceID'] ."</option>";
	}
	echo "</select>";
?>


