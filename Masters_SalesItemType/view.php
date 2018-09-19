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

<h4 class="page-header"><a class="btn btn-primary"><i class="fa fa-bars"></i></a>Product Type Details :<hr/></h4>
	<!--	<table class="table"> -->
	<table id="examples" class="display" style="width:100%">
			
				
					<thead>
			<tr>
				
				<th>ID</th>
				<th>Item Type Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

		</thead>
			
	<?php 
		$sql = "SELECT * FROM `salesproducttypetbl` ";
		$res = $conn->query($sql);
		if ($res->num_rows>0) {
			
			while ($row=$res->fetch_assoc()) {
		
	echo "<tr>";			
echo "<td>{$row["ProductTypeId"]}</td>";
echo "<td>{$row["ProductTypeName"]}</td>";
echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$row["ProductTypeId"]}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$row["ProductTypeId"]}'><i class='fa fa-trash'></i></td>";
	echo "</tr>";
			
			}
		}
 	?>
<tfoot>
				<tr>
				<th>ID</th>
				<th>Item Type Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
</tfoot>
		</table>
		<input type="hidden" id="abcd" value="<?php echo $var; ?>" >

</body>
</html>