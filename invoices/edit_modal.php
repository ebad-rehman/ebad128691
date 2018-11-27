<div class="modal fade" id="edit<?php echo $urow['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php
		$n=mysqli_query($conn,"select I.*, P.Brand from salesorder_12869 I, product P where ID='".$urow['ID']."' AND I.ProductCode = P.ProductCode");
		$nrow=mysqli_fetch_array($n);
	?>
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#3d3730; color:orange;">
		<div class = "modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<center><h3 style="color:orange;">Update Row</h3></center>
		</div>
		<form class="form-inline">
		<div class="modal-body">
			PRODUCT: <input type="text" value="<?php echo $nrow['Brand']; ?>" class="form-control" readonly>
			QUANTITY: <input type="number" value="<?php echo $nrow['Quantity']; ?>" id="uQuantity<?php echo $urow['ID']; ?>" class="form-control">
			DISCOUNT: <input type="number" value="<?php echo $nrow['Discount']; ?>" id="uDiscount<?php echo $urow['ID']; ?>" class="form-control">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" style="background-color:#8b0000; color:white;" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="updateuser btn btn-success" style="background-color:#5F9EA0; color:white;" value="<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
		</form>
    </div>
  </div>
</div>
