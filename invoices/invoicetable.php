<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>Customer ID</th>
				<th>Shop Name</th>
				<th>Contact Person</th>
				<th>Contact NO</th>
				<th>Address</th>
				<th>Area</th>
				<th>GeoCord</th>
				<th>SalesPerson ID</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,'SELECT * FROM customer_12869');
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['CustomerID']; ?></td>
									<td><?php echo $urow['ShopName']; ?></td>
									<td><?php echo $urow['ContactPerson']; ?></td>
									<td><?php echo $urow['ContactNO']; ?></td>
									<td><?php echo $urow['Address']; ?></td>
									<td><?php echo $urow['Area']; ?></td>
									<td><?php echo $urow['GeoCord']; ?></td>
									<td><?php echo $urow['SalesPersonID']; ?></td>
									<td style = "width: 210px"><button class="btn btn-success" style="background-color:orangered; color:white;" data-toggle="modal" data-target="#edit<?php echo $urow['CustomerID']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" style="background-color:#8b0000; color:white;" value="<?php echo $urow['CustomerID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
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
