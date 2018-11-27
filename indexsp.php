<!DOCTYPE html>
<html>
<head>
	<title>SalesPerson </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include('serversp.php');
include('homepage.php');




	if (isset($_GET['edit'])) {
		$SalesPersonID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM salesperson WHERE SalesPersonID='$SalesPersonID'");

	//	if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
		$SalesPersonID = $n['SalesPersonID'];
		$Name = $n['Name'];
               $ContactNo = $n['ContactNo'];
		$ListOfCustomers = $n['ListOfCustomers'];
                
                
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

<?php $results = mysqli_query($db, "SELECT * FROM salesperson"); ?>

<table>
	<thead>
		<tr>

			<h3> SalesPersons  </h3>


			 <th>Sales Person ID</th>
			<th>Name</th>
		        <th>Contact No</th>
                        <th>List Of Customers</th>
			<th>Actions</th>
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['SalesPersonID']; ?></td>
			<td><?php echo $row['Name']; ?></td>
			<td><?php echo $row['ContactNo']; ?></td>
			<td><?php echo $row['ListOfCustomers']; ?></td>
			<td>
                            <a href="indexsp.php?edit=<?php echo $row['SalesPersonID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="serversp.php?del=<?php echo $row['SalesPersonID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="serversp.php" >

	<input type="hidden" Name="SalesPersonID" value="<?php echo $SalesPersonID; ?>">
	<div class="input-group">
	
	<div class="input-group">
		<label>Sales Person ID</label>
		<input type="text" Name="SalesPersonID" value="<?php echo $SalesPersonID; ?>">
	</div>
	<div class="input-group">
		<label>Name</label>
		<input type="text" Name="Name" value="<?php echo $Name; ?>">
	</div>	

	
	<div class="input-group">
		<label> Contact No</label>
		<input type="text" Name="ContactNo" value="<?php echo $ContactNo; ?>">
	</div>
         <div class="input-group">
		<label>List Of Customers</label>
		<input type="text" Name="ListOfCustomers" value="<?php echo $ListOfCustomers; ?>">
	</div>
        



	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" Name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" Name="save" >Save</button>
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