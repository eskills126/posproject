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
				<i class="fa fa-recycle fa-2x" aria-hidden="true" style="color: red;">&nbsp Delete Data</i>
			</span>
		</summary>
<h4 class="page-header"><a class="btn btn-primary"><i class="fa fa-bars"></i></a>Purchase Details:<hr/></h4>
	<!--	<table class="table"> -->

	<div class="table-responsive">
	<table id="examples" class="display" style="width: 100%;">
			
				
					<thead>
			<tr>
				
				<th>Edit</th>
				<th>Delete</th>
				<th>ID</th>
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
				<th>Gross Rate</th>
				<th>Gross Amount</th>
				<th>Discount %</th>
				<th>Discount Value</th>
				<th>Discount Rate</th>
				<th>Rate</th>
				<th>Amount</th>
				<th>Display ID</th>
				<th>Remarks</th>
				
			</tr>

		</thead>
			
	<?php 
		$sql = "SELECT * FROM `purchaseorderdetailtbl` ";
		$res = $conn->query($sql);
		if ($res->num_rows>0) {
			
			while ($row=$res->fetch_assoc()) {
		
	echo "<tr>";
	echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$row["PurOrderId"]}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$row["PurOrderId"]}'><i class='fa fa-trash'></i></td>";			
echo "<td>{$row["PurOrderId"]}</td>";
echo "<td>{$row["PurDate"]}</td>";
echo "<td>{$row["PurSupCode"]}</td>";
echo "<td>{$row["PurSupCodeName"]}</td>";
echo "<td>{$row["PurSupBal"]}</td>";
echo "<td>{$row["PurItemCode"]}</td>";
echo "<td>{$row["PurItemName"]}</td>";
echo "<td>{$row["PurWHCode"]}</td>";
echo "<td>{$row["PurWHName"]}</td>";
echo "<td>{$row["PurQty"]}</td>";
echo "<td>{$row["PurStockQty"]}</td>";
echo "<td>{$row["PurGrossRate"]}</td>";
echo "<td>{$row["PurGrossAmount"]}</td>";
echo "<td>{$row["PurDiscInPercent"]}</td>";
echo "<td>{$row["PurDiscValueInRate"]}</td>";
echo "<td>{$row["PurDiscRate"]}</td>";
echo "<td>{$row["PurRate"]}</td>";
echo "<td>{$row["PurAmount"]}</td>";
echo "<td>{$row["DisplayID"]}</td>";
echo "<td>{$row["PurRemarks"]}</td>";



	echo "</tr>";
			
			}
		}
 	?>
<tfoot>
				<tr>
				<th>Edit</th>
				<th>Delete</th>
				<th>ID</th>
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
				<th>Gross Rate</th>
				<th>Gross Amount</th>
				<th>Discount %</th>
				<th>Discount Value</th>
				<th>Discount Rate</th>
				<th>Rate</th>
				<th>Amount</th>
				<th>Display ID</th>
				<th>Remarks</th>
				
			</tr>
</tfoot>
		</table>
</div>
</details>


		<input type="hidden" id="abcd" value="<?php echo $var; ?>" >


