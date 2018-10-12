<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php session_start();
$var=$_SESSION['user_session'];
 ?>

<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="java.js"></script>
<!-----------This code segment is used to show data in Descending Order in Datatable------------->
<script type="text/javascript">
	$(document).ready(function() {
    $('.display').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );
</script>

<!---------This code segment is used to Confirm If ADMIN before Deleting any Record----------->
<!---------Only Admin can Delete Or Edit Records---------------------------------------------->
<script >
	$(document).ready(function(){
	$(".del").click(function(){
		if ($("#abcd").val() != 2) {
			alert("You are Not Admin");
			return false;
			}else{
				return confirm("Are You Sure, You Want to Delete");
			}
	});
	}); </script>

<script >
	$(document).ready(function(){
	$(".edit").click(function(){
		if ($("#abcd").val() != 2) {
			alert("You are Not Admin, You Con't Edit Any Records");
			return false;
			}
	});
	}); </script>	
</head>



<?php 
include '..\db_connect.php';
 ?>
<div class="container-fluid">
	<details>
		<summary>
			<span>
				<i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color: blue;">&nbsp Edit</i> 
				<i class="fa fa-recycle fa-2x" aria-hidden="true" style="color: red;">&nbsp Delete</i>
			</span>
		</summary>
<h4 class="page-header"><a class="btn btn-primary"><i class="fa fa-bars"></i></a>Sales Detail:<hr/></h4>
	<!--	<table class="table"> -->

	<div class="table-responsive">
	<table id="examples" class="display" style="width: 100%;">
			
				
					<thead>
			<tr>
				
				<th>Edit</th>
				<th>Delete</th>
				<th>No</th>
				<th>Date</th>
				<th>Supplier Code</th>
				<th>Supplier Name</th>
				<th>Balance</th>
				<th>Item Code</th>
				<th>Item Name</th>
				<th>Warehouse Code</th>
				<th>Warehouse Name</th>
				<th>Quantity</th>
				<th>Stock Quantity</th>
				<th>Previous Rate</th>
				<th>Gross Rate</th>
				<th>Gross Amount</th>
				<th>Display ID</th>
				<th>Remarks</th>
				<th>Total Quantity</th>
				<th>Bill Amount</th>
				<th>Discount%</th>
				<th>Discount Value</th>
				<th>Freight</th>
				<th>Net Bill</th>
			</tr>

		</thead>
			
	<?php 
		$sql = "SELECT * FROM `salesorderdetailtbl` ";
		$res = $conn->query($sql);
		if ($res->num_rows>0) {
			
			while ($row=$res->fetch_assoc()) {
		
	echo "<tr>";
	echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$row["SaleAutoId"]}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$row["SaleAutoId"]}'><i class='fa fa-trash'></i></td>";			
//echo "<td>{$row["PurAutoId"]}</td>";
echo "<td>{$row["SaleOrderId"]}</td>";
echo "<td>{$row["SaleDate"]}</td>";
echo "<td>{$row["SaleCusCode"]}</td>";
echo "<td>{$row["SaleCusCodeName"]}</td>";
echo "<td>{$row["SaleCusBal"]}</td>";
echo "<td>{$row["SaleItemCode"]}</td>";
echo "<td>{$row["SaleItemName"]}</td>";
echo "<td>{$row["SaleWHCode"]}</td>";
echo "<td>{$row["SaleWHName"]}</td>";
echo "<td>{$row["SaleQty"]}</td>";
echo "<td>{$row["SaleStockQty"]}</td>";
echo "<td>{$row["SalePreviousRate"]}</td>";
echo "<td>{$row["SaleGrossRate"]}</td>";
echo "<td>{$row["SaleGrossAmount"]}</td>";
echo "<td>{$row["DisplayID"]}</td>";
echo "<td>{$row["SaleRemarks"]}</td>";


echo "<td>{$row["SaleTQty"]}</td>";
echo "<td>{$row["SaleBillAmount"]}</td>";
echo "<td>{$row["SaleDiscPercentage"]}</td>";
echo "<td>{$row["SaleDiscountValue"]}</td>";
echo "<td>{$row["SaleFreight"]}</td>";
echo "<td>{$row["SaleNetBill"]}</td>";












	echo "</tr>";
			
			}
		}
 	?>
<tfoot>
				<tr>
				<th>Edit</th>
				<th>Delete</th>
				<th>No</th>
				<th>Date</th>
				<th>Supplier Code</th>
				<th>Supplier Name</th>
				<th>Balance</th>
				<th>Item Code</th>
				<th>Item Name</th>
				<th>Warehouse Code</th>
				<th>Warehouse Name</th>
				<th>Quantity</th>
				<th>Stock Quantity</th>
				<th>Previous Rate</th>
				<th>Gross Rate</th>
				<th>Gross Amount</th>
				<th>Display ID</th>
				<th>Remarks</th>
				<th>Total Quantity</th>
				<th>Bill Amount</th>
				<th>Discount%</th>
				<th>Discount Value</th>
				<th>Freight</th>
				<th>Net Bill</th>
			</tr>
</tfoot>
		</table>
</div>
</details>


		<input type="hidden" id="abcd" value="<?php echo $var; ?>" >


