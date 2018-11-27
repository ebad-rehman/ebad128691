<?php
	include('conn.php');
	session_start();

 if(!isset($_SESSION['UserID']))
 {
	header("Location: ../login1.php");
 }
?>
<html lang = "en">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<!--<link rel = "stylesheet" type = "text/css" href = "../style.css" /> -->
		<title>Invoice</title>
	</head>
<body>
	<ul>
  <li><a href="../Welcome.php">Home</a></li>
  <li><a href="../index.php">Customers</a></li>
  <li><a href="../indexp.php">Products</a></li>
  <li><a href="../indexsp.php">Sales</a></li>
  <li><a href="../indexu.php">Users</a></li>
  <li><a class = "active" href="./index.php">Invoices</a></li>
  <li style="float:right"><a id = "logout-btn" href="../logout.php">Logout</a></li>
  <li style="float:right"><a>Welcome <?php echo $_SESSION['UserID'];?></a></li>
	</ul>
	<div style="height:30px;"></div>
	<div class = "row">	
		<div class = "col-md-1">
		</div>
		<div class = "col-md-10 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 style="color:orange;">Select Invoice</h2></center>
					<hr>
					<form  id = "invform" class = "form-horizontal">
						<div class = "form-group">
							<label>CUSTOMER ID</label>
							<?php
									$sql = "SELECT CustomerID FROM customer_12869";
									$result = mysqli_query($conn, $sql);
									echo "<select type = 'text' id = 'searchid' class = 'form-control'>";
									echo "<option value= ''>SELECT CUSTOMER</option>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<option value='" . $row['CustomerID'] ."'>" . $row['CustomerID'] ."</option>";
									}
									echo "</select>";
							?>
						</div>
						<div class = "form-group">
							<div id = "searchinv"></div>
						</div>
					</form>
					<button class="btn btn-success" style="background-color:#5F9EA0;" data-toggle="modal" data-target="#createinvoice"><span class = "glyphicon glyphicon-pencil"></span>Add New Invoice</button>
					<hr>
					
					<div id="userTable"></div>

					<button class="btn btn-success" style="background-color:#5F9EA0;" id = "add1" data-toggle="modal" data-target="#addentry" disabled="true"><span class = "glyphicon glyphicon-pencil" ></span>Add Item</button>


					<div class="modal fade" id="createinvoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
   						 <div class="modal-content" style="background-color:#3d3730; color:orange;">
						<div class = "modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h3 style="color:orange;">Create Invoice</h3></center>
					</div>
					<div class="modal-body">
					<form  id = "addform" class = "form-horizontal">
						<div class = "form-group">
							<label>Invoice ID</label>
							<input type  = "text" id = "InvoiceID" class = "form-control">
						</div>
						<div class = "form-group">
							<label>Date</label>
							<input type  = "date" id = "Date" class = "form-control">
						</div>
						<div class = "form-group">
							<label>Customers ID</label>
							<input type  = "text" id = "CustomerID" class = "form-control">
						</div>
						<div class = "form-group">
							<label>Shop Name</label>
							<input type  = "text" id = "ShopName" class = "form-control" readonly>
						</div>
					    <div class = "form-group">
							<label>Customers Name</label>
							<input type  = "text" id = "ContactPerson" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>Contact No</label>
							<input type  = "text" id = "ContactNo" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>Address</label>
							<input type  = "text" id = "Address" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>Area</label>
							<input type  = "text" id = "Area" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>Geo Cord</label>
							<input type  = "text" id = "GeoCord" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>Salesperson ID</label>
							<input type  = "text" id = "SalesPersonID" class = "form-control" readonly>
						</div>
						

					</form>
					</div>
				<div class="modal-footer">
			<button type="button" class="btn btn-default" style="background-color:#8b0000; color:white;" data-dismiss="modal" ><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="btn btn-success" style="background-color:#5F9EA0; color:white;" id="addnew"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>			
</div>
</div>
</div>
</div>
</div>
		<div class="modal fade" id="addentry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
   						 <div class="modal-content" style="background-color:#3d3730; color:orange;">
						<div class = "modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h3 style="color:orange;">Add Entry</h3></center>
					</div>
					<div class="modal-body">
					<form  class = "form-horizontal">
						
						<div class = "form-group">
							<label>ITEM</label>
							<?php
									$sql = "SELECT * FROM product";
									$result = mysqli_query($conn, $sql);
									echo "<select type = 'text' id = 'ProductCode' class = 'form-control' name='type'>";
									echo "<option value= ''>SELECT PRODUCT</option>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<option value='" . $row['ProductCode'] ."'>" . $row['Brand'] ."</option>";
									}
									echo "</select>";
							?>
						</div>
						<div class = "form-group">
							<label>Quantity</label>
							<input type  = "number" id = "Quantity" class = "form-control">
						</div>
						<div class = "form-group">
							<label>Discount</label>
							<input type  = "number" id = "Discount" value = '0' class = "form-control">
						</div>
						<div class = "form-group">
							<label>Total</label>
							<input type  = "number" id = "total" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>Type</label>
							<input type  = "text" id = "Type" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>Shade</label>
							<input type  = "text" id = "Shade" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>Size</label>
							<input type  = "text" id = "Size" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>Unit Price</label>
							<input type  = "number" id = "SalesPrice" class = "form-control" readonly>
						</div>
						
					</form>
					</div>
				<div class="modal-footer">
			<button type="button" class="btn btn-default" style="background-color:#8b0000; color:white;" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="btn btn-success" style="background-color:#5F9EA0; color:white;" id="additem"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
				</div>
				</div><br>
			
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>	
<script src = "js/bootstrap.js"></script>

<script type = "text/javascript">
$(document).ready(function(){
		var price = 0;
		$('#searchid').change(function(){
			if ($('#searchid').val() == "")
				$('#searchInvoiceID').prop('disabled', true);
			else
			{
				$('#searchInvoiceID').prop('disabled', false);
				showinvid();
			}
		});
		$('#searchinv').change(function(){
			if ($('#searchInvoiceID').val() == "")
				$('#add1').prop('disabled', true);
			else
			{
				$('#add1').prop('disabled', false);
			}
			show();
		});

$('#Quantity').change(function(){
				var total = parseInt((100-$('#Discount').val())/100 * $('#SalesPrice').val() * $('#Quantity').val()); 
   				$('#total').val(total);
});

$('#Discount').change(function(){
				var total = parseInt((100-$('#Discount').val())/100 * $('#SalesPrice').val() * $('#Quantity').val()); 
   				$('#total').val(total);
});

$('#ProductCode').change(function(){
			$ProductCode = $('#ProductCode').val();
   		
   		$.ajax({
   			type: "POST",
   			url: "search.php",
   			data: {
   				ProductCode: $ProductCode,
   				searchprod: 1,
   			},
   			
   			success: function(data)
   			{
   				var obj = JSON.parse(data);
   				$('#Shade').val(obj.Shade);
   				$('#Type').val(obj.Type);
   				$('#Size').val(obj.Size);
   				$('#SalesPrice').val(obj.SalesPrice);
   				SalesPrice = parseInt(obj.SalesPrice);
   			}
   		});
});

$('#CustomerID').change(function(){
			$CustomerID = $('#CustomerID').val();
   		
   		$.ajax({
   			type: "POST",
   			url: "search.php",
   			data: {
   				CustomerID: $CustomerID,
   				search: 1,
   			},
   			
   			success: function(data)
   			{
   				var obj = JSON.parse(data);
   				$('#CustomerID').val(obj.CustomerID);
   				$('#ShopName').val(obj.ShopName);
   				$('#ContactPerson').val(obj.ContactPerson);
				$('#ContactNo').val(obj.ContactNo);
   				$('#Address').val(obj.Address);
				$('#Area').val(obj.Area);
   				$('#GeoCord').val(obj.GeoCord);
   				$('#SalesPersonID').val(obj.SalesPersonID);
				
   			}
   		});
});

$(document).on('click', '#additem', function(){
			if ($('#p\ProductCode').val()=="" || $('#Quantity').val()=="" || $('#Quantity').val()<=0 || $('#Discount').val()<0|| $('#Discount').val() == ''){
				alert('Please input data first');
			}
			else{
			$('#addentry').modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$ProductCode=$('#ProductCode').val();
			$Quantity=$("#Quantity").val();
			$Discount=$("#Discount").val();	
			$InvoiceID=$("#searchInvoiceID").val();
			$('#additem').html('Adding..');
			$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						ProductCode: $ProductCode,
						InvoiceID: $InvoiceID,
						Quantity: $Quantity,
						Discount: $Discount,
						additem: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
        					alert($obj);
						$('#additem').html('Add');
						show();
						
					}
				});
			}
		});


		//ADD NEW
		$(document).on('click', '#addnew', function(){
			if ($('#CustomerID').val()=="" || $('#InvoiceID').val()=="" || isNaN(Date.parse($('#Date').val()))){
				alert('Please input data first');
			}
			else{
			$('#createinvoice').modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$CustomerID=$('#CustomerID').val();
			$InvoiceID=$("#InvoiceID").val();
			$Date=$("#Date").val();	
			$('#addnew').html('Adding..');
			$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						CustomerID: $CustomerID,
						InvoiceID: $InvoiceID,
						Date: $Date,
						add: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
        					alert($obj);
						$('#addnew').html('Add');
						showinvid();
						
					}
				});
			}
		});
		

		//DELETE
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
			$(this).html('Deleting..');
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						del: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
						{
        					alert($obj);
        					$(this).html('Delete');
						}
        				showinvid();
        				show();
					}
				});
		});

		$(document).on('click', '.deleteitem', function(){
			$id=$(this).val();
			$(this).html('Deleting..');
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						delitem: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
						{
        					alert($obj);
        					$(this).html('Delete');
						}
        				show();
					}
				});
		});

		//UPDATE
		$(document).on('click', '.updateuser', function(){
			$uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$uQuantity=$('#uQuantity'+$uid).val();
			$uDiscount=$('#uDiscount'+$uid).val();
			$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $uid,
						Quantity: $uQuantity,
						Discount: $uDiscount,
						edit: 1,
					},
					success: function(){
						show();
					}
				});
		});
	
	});
	
	function showinvid(){
		$searchid = $('#searchid').val();
		$.ajax({
			url: 'searchinvoice.php',
			type: 'POST',
			data:{
				searchid: $searchid,
			},
			success: function(response){
				$('#searchinv').html(response);
			}
		});
	}
	function show(){
		$CustomerID=$('#searchid').val();
		$InvoiceID=$('#searchInvoiceID').val();
		$.ajax({
			url: 'show_user.php',
			type: 'POST',
			data:{
				InvoiceID: $InvoiceID,
				CustomerID: $CustomerID,
				show: 1,
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
	
</script>
<style type="text/css">
body{
	background-color:#3d3730;
	color:orange;
}
	#invform{

		padding: 20px 20px;
		border: 2px solid;
	}

ul {
    list-style-type: none;
    margin: 0;
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
</html>
