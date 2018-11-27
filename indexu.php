<!DOCTYPE html>
<html>
<head>
	<title>Users </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include('serveru.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$UserID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM users_12869 WHERE UserID='$UserID'");

	//	if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
		$UserID = $n['UserID'];
		$Password = $n['Password'];
                $Active = $n['Active'];
                $SalesPerson = $n['SalesPerson'];
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

<?php $results = mysqli_query($db, "SELECT * FROM users_12869"); ?>

<table>
	<thead>
		<tr>

			<h3> USERS INFORMATION </h3>


			<th>UserID</th>
			<th>Password</th>
                        <th>Active</th>
			<th>SalesPerson</th>
			<th>Actions</th>
			
			
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['UserID']; ?></td>
			<td><?php echo $row['Password']; ?></td>
			<td><?php echo $row['Active']; ?></td>
                            <td><?php echo $row['SalesPerson']; ?></td>
			<td>
                            <a href="indexu.php?edit=<?php echo $row['UserID']; ?>" class="edit_btn" >Edit</a>
			
                            <a href="serveru.php?del=<?php echo $row['UserID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


    <form method="post" action="serveru.php" >

	<input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>UserID</label>
		<input type="text" name="UserID" value="<?php echo $UserID; ?>">
	</div>	

	<div class="input-group">
		<label>Password</label>
		<input type="text" name="Password" value="<?php echo $Password; ?>">
	</div>

	<div class="input-group">
		<label> Active</label>
		<input type="text" name="Active" value="<?php echo $Active; ?>">
	</div>
            <div class="input-group">
		<label>SalesPerson</label>
		<input type="text" name="SalesPerson" value="<?php echo $SalesPerson; ?>">
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