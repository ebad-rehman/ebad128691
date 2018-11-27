<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>Invoice ID</th>
				<th>DATE(YYYY-MM-DD)</th>
				<th>Customer ID</th>
				<th>ShopName</th>
				<th>Contact Person</th>
				<th>Contact NO</th>
				<th>Address</th>
				<th>Area</th>
				<th>GeoCord</th>
				<th>SalesPerson ID</th>
				<th>ACTIONS</th>
			</thead>
				<tbody>
					<?php
					$CustomerID = $_POST['CustomerID'];
					$InvoiceID = $_POST['InvoiceID'];
					if($CustomerID != "" || $InvoiceID != "" || $InvoiceID != 'NOT ASSIGNED'){
					$qinv = mysqli_query($conn, "SELECT * FROM invoice_12869 WHERE InvoiceID = '$InvoiceID'");
					$invrow = mysqli_fetch_array($qinv);
					if($invrow != NULL){
						$quser=mysqli_query($conn,"SELECT * FROM customer_12869 WHERE CustomerID = '$CustomerID'");
						$urow=mysqli_fetch_array($quser);
							?>
								<tr>
									<td><?php echo $invrow['InvoiceID'];?> </td>
									<td><?php echo $invrow['Date'];?> </td>
									<td><?php echo $invrow['CustomerID'];?> </td>
									<td><?php echo $urow['ShopName']; ?></td>
									<td><?php echo $urow['ContactPerson']; ?></td>
									<td><?php echo $urow['ContactNo']; ?></td>
									<td><?php echo $urow['Address']; ?></td>
									<td><?php echo $urow['Area']; ?></td>
									<td><?php echo $urow['GeoCord']; ?></td>
									<td><?php echo $urow['SalesPersonID']; ?></td>
									<td > <button class="btn btn-danger delete" style="background-color:#8b0000; color:white;" value="<?php echo $invrow['InvoiceID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									
									</td>
								</tr>
							<?php } }?>
				</tbody>
			</table>
			<center><h2 style="color:orange;">Invoice</h2></center>
			<hr>

					<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>ID</th>
				<th>Invoice ID</th>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Discount(%)</th>
				<th>Total</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,"SELECT I.ID, I.InvoiceID, P.Brand, P.SalesPrice, I.Quantity, I.Discount, cast((100-I.Discount)/100*(I.Quantity*P.SalesPrice) as int) AS Total FROM salesorder_12869 I, product P WHERE I.InvoiceID = '$InvoiceID' AND I.ProductCode = P.ProductCode");
						
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['ID']; ?></td>
									<td><?php echo $urow['InvoiceID']; ?></td>
									<td><?php echo $urow['Brand']; ?></td>
									<td><?php echo $urow['SalesPrice']; ?></td>
									<td><?php echo $urow['Quantity']; ?></td>
									<td><?php echo $urow['Discount']; ?></td>
									<td><?php echo $urow['Total']; ?></td>
									
									<td style = "width: 210px"><button class="btn btn-success" style="background-color:orangered; color:white;" data-toggle="modal" data-target="#edit<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger deleteitem"style="background-color:#8b0000; color:white; border-color:orangered;" value="<?php echo $urow['InvoiceID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									<?php include('edit_modal.php'); ?>
									</td>
								</tr>
							<?php
						}
					
					?>
				</tbody>
			</table>
		<?php
	}
?>
