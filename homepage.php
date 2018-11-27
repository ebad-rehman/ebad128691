<?php
$db = mysqli_connect('localhost','Ebad12869','123456','ebad rehman 12869');
   include('session.php');
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
<ul>
  <li><a href="Welcome.php">Home</a></li>
  <li><a href="index.php">Customers</a></li>
  <li><a href="indexp.php">Products</a></li>
  <li><a href="indexsp.php">Sales</a></li>
  <li><a href="indexu.php">Users</a></li>
  <li><a href="invoices/index.php">Invoices</a></li>
  <li style="float:right"><a id = "logout-btn" href="logout.php">Logout</a></li>
  <li style="float:right"><a>Welcome <?php echo $_SESSION['UserID'];?></a></li>
  </ul>
</body>
</html>
<style type="text/css">
body{
	background-color:#3d3730;
	color:orangered;
}
ul {
    list-style-type: none;
    margin-top: 0;
    margin-bottom: 1rem;
    padding: 0;
    overflow: hidden;
    background-color: orange;
}

li {
    float: left;
}

li a {
    display: block;
    color: white !important;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none !important;
}

li a:hover:not(.active) {
    background-color: orangered;
}
#logout-btn:hover{
	background-color: orangered;
}

.active {
    background-color: red;
}
.active:hover {
    background-color: orangered;
    border-color: #419641;
}
</style>
