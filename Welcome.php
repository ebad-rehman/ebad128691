<?php
$db = mysqli_connect('localhost','Ebad12869','123456','ebad rehman 12869');
   include('session.php');
   
?>
<!DOCTYPE html>
<html>
<head>
<Title>Welcome</Title>
</head>
<body>
<div class="header">
  <img src="logo.png" alt="logo" style="width:300px; height:230px; position:absolute; top:-65px; " />
  <h1 style="position: relative; top:83px; left:10%;">The Paint Shop</h1>
</div>
<h3 style="position: absolute; top:35%; left: 45%;"><a>Welcome <?php echo $_SESSION['UserID'];?></a></h3>
<form action="Welcome.php">
    <button class="home" type="submit">Home</button>
</form>
<form action="index.php">
    <button class="Customer" type="submit">Customers</button>
</form>
<form action="indexp.php">
    <button class="Product" type="submit">Products</button>
</form>
<form action="indexsp.php">
    <button class="Sales" type="submit">Sales Person</button>
</form>
<form action="indexu.php">
    <button class="Users" type="submit">Users</button>
</form>
<form action="invoices/index.php">
    <button class="Invoices" type="submit">Invoices</button>
</form>
<form action="logout.php">
    <button class="logout" type="submit">Sign-out</button>
</form>
</body>
</html> 
<style type="text/css">
body{
	background-color:#3d3730;
	color:orange;
	font-family: "segoe-ui", "open-sans", tahoma, arial;
}
.logout{
	position:absolute;
	top:85%;
	left:46%;
}
button{
	padding: 12px 18px;
	margin:5px;
	position: absolute;
	top:70%;
	background-color:orange;
	border-radius:8px;
	border-color: orange;
	color:white;
	font-family: "segoe-ui", "open-sans", tahoma, arial;
	font-size:15px;
}
.home{
	top:55%;
	left:46.5%;
}
.Customer{
	left:20%;
}

.Product{
	left:33%;
}

.Sales{
	left:44.75%;
}

.Users{
	left:59%;
}
.Invoices{
	left:70%;
}
.header{
	position:absolute;
	left:39%;
}
</style>