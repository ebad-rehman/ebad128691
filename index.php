<!DOCTYPE html>
<html>
<head>
	<title>Customers</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include('homepage.php');
include('server.php');


	if (isset($_GET['edit'])) {
		$CustomerID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer_12869 WHERE CustomerID='$CustomerID'");

	//	if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
		$CustomerID = $n['CustomerID'];
		$ShopName = $n['ShopName'];
                $ContactPerson = $n['ContactPerson'];
		$ContactNo = $n['ContactNo'];
                $Address = $n['Address'];
                $Area = $n['Area'];
				$GeoCord = $n['GeoCord'];
                $SalesPersonID = $n['SalesPersonID'];

		//}

	}
?>


	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM customer_12869"); ?>

<table>
	<thead>
		<tr>

			<h3> CUSTOMERS </h3>


			<th>Customer ID</th>
			<th>Shop Name</th>
            <th>Contact Person</th>
            <th>Contact No</th>
            <th>Address</th>
			<th>Area</th>
			<th>Geo Cord</th>
			<th>Sales Person ID</th>
			<th>Actions</th>
			
			
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['CustomerID']; ?></td>
			<td><?php echo $row['ShopName']; ?></td>
			<td><?php echo $row['ContactPerson']; ?></td>
			<td><?php echo $row['ContactNo']; ?></td>
            <td><?php echo $row['Address']; ?></td>
            <td><?php echo $row['Area']; ?></td>
			<td><?php echo $row['GeoCord']; ?></td>
            <td><?php echo $row['SalesPersonID']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['CustomerID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server.php?del=<?php echo $row['CustomerID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server.php" >

	<input type="hidden" name="CustomerID" value="<?php echo $CustomerID; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>Customer ID</label>
		<input type="text" name="CustomerID" value="<?php echo $CustomerID; ?>">
	</div>	

	<div class="input-group">
		<label>Shop Name</label>
		<input type="text" name="ShopName" value="<?php echo $ShopName; ?>">
	</div>

	<div class="input-group">
		<label> Contact Person</label>
		<input type="text" name="ContactPerson" value="<?php echo $ContactPerson; ?>">
	</div>
         <div class="input-group">
		<label>Contact No</label>
		<input type="text" name="ContactNo" value="<?php echo $ContactNo; ?>">
	</div>
        <div class="input-group">
		<label>Address</label>
		<input type="text" name="Address" value="<?php echo $Address; ?>">
	</div>
            <div class="input-group">
		<label>Area</label>
		<input type="text" name="Area" value="<?php echo $Area; ?>">
	</div>
	<div class="input-group">
		<label>Geo Cord</label>
		<input type="text" name="GeoCord" value="<?php echo $GeoCord; ?>">
	</div>
            <div class="input-group">
		<label>Sales Person ID</label>
		<input type="text" name="SalesPersonID" value="<?php echo $SalesPersonID; ?>">
	</div>
	


	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>
<style type="text/css">
body{
	background-color:#3d3730;
	color:orangered;
}
</style>