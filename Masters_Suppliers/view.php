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
        "order": [[ 0, "desc" ]]
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
<body>


<?php 
include '..\db_connect.php';
 ?>

<h4 class="page-header"><i class="fa fa-table fa-lg" aria-hidden="true"style="color: blue;"></i> Supplier Details:<hr/></h4>
	<!--	<table class="table"> -->
	<table id="examples" class="display" style="width:100%">
			
				
					<thead>
			<!--<tr  id="DESC">  -->
				<tr>
				<th>Edit</th>
				<th>Delete</th>
				<th>ID</th>
				<th>Supplier Name</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Opening Balance</th>
				
			</tr>

		</thead>
			
	<?php 
		$sql = "SELECT * FROM `suptbl` ";
		$res = $conn->query($sql);
		if ($res->num_rows>0) {
			
			while ($row=$res->fetch_assoc()) {
		
	echo "<tr>";			
echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$row["SupId"]}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$row["SupId"]}'><i class='fa fa-trash'></i></td>";
echo "<td>{$row["SupId"]}</td>";
echo "<td>{$row["SupName"]}</td>";
echo "<td>{$row["SupAddress"]}</td>";
echo "<td>{$row["SupContact"]}</td>";
echo "<td>{$row["SupOpenBal"]}</td>";

	echo "</tr>";
			
			}
		}
 	?>
<tfoot>
				<tr>
				<th>Edit</th>
				<th>Delete</th>
				<th>ID</th>
				<th>Supplier Name</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Opening Balance</th>
				
			</tr>
</tfoot>
		</table>
		<input type="hidden" id="abcd" value="<?php echo $var; ?>" >

</body>
</html>