<?php
	include('conn.php');
	$sql = "SELECT * FROM product";
	$result = mysqli_query($conn, $sql);
	echo "<label>PRODUCT</label>";
	echo "<select type = 'text' id = 'searchInvoiceID' class = 'form-control' name='PRODUCT'>";
	echo "<option value= ''>SELECT PRODUCT</option>";
	while ($row = mysqli_fetch_array($result)) {
	echo "<option value='" . $row['ProductCode'] ."'>" . $row['Brand'] ."</option>";
	}
	echo "</select>";
?>



