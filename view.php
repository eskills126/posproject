<!DOCTYPE html>
<html>
<head>
	<title></title>

<script src="header.php"></script>
<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="java.js"></script>
<!--------Code to customize the Search Box (Placeholder......)----------->
<script type="text/javascript">
	$(document).ready( function () {
  $('.display').DataTable(
    { language: {
        searchPlaceholder: "Search records:",
      search: "",
      }
    });
  
  
} );
</script>
</head>
<body>


<?php 
include 'config.php';
 ?>
<h4 class="page-header"><i class="fa fa-users"></i>Student Deatils</h4>
	<!--	<table class="table"> -->
	<table id="examples" class="display" style="width:100%">
			<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Age</th>
				<th>City</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			</thead>
	<?php 
		$sql = "SELECT * FROM user Where ID=(SELECT max(ID) From user)";
		$res = $con->query($sql);
		if ($res->num_rows>0) {
			
			while ($row=$res->fetch_assoc()) {
				//echo "<tbody>";
				echo "<tr>";
echo "<td>{$row["ID"]}</td>";				
echo "<td>{$row["NAME"]}</td>";
echo "<td>{$row["AGE"]}</td>";
echo "<td>{$row["CITY"]}</td>";
echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$row["ID"]}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$row["ID"]}'><i class='fa fa-trash'></i></td>";
				echo "</tr>";
			//	echo "</tbody>";
			}
		}
 	?>
<tfoot>
				<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Age</th>
				<th>City</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
</tfoot>
		</table>

		</body>
</html>