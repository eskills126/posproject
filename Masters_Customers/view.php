<!DOCTYPE html>
<html>
<head>
	<title></title>


<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="java.js"></script>

</head>
<body>


<?php 
include '..\db_connect.php';
 ?>
<h4 class="page-header"><i class="fa fa-users"></i>Customer Deatils</h4>
	<!--	<table class="table"> -->
	<table id="example" class="display" style="width:100%">
			<thead>
			<tr>
				<th>ID</th>
				<th>Customer Name</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Credit Limit</th>
				<th>Opening Balance</th>
				<th>Customer Area</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			</thead>
	<?php 
		$sql = "SELECT * FROM customertbl";
		$res = $conn->query($sql);
		if ($res->num_rows>0) {
			
			while ($row=$res->fetch_assoc()) {
				//echo "<tbody>";
				echo "<tr>";
				
echo "<td>{$row["CusId"]}</td>";
echo "<td>{$row["CusName"]}</td>";
echo "<td>{$row["CusAddress"]}</td>";
echo "<td>{$row["CusContact"]}</td>";
echo "<td>{$row["CusCreditLimit"]}</td>";
echo "<td>{$row["CusOpenBal"]}</td>";
echo "<td>{$row["CusAreaName"]}</td>";
echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$row["CusId"]}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$row["CusId"]}'><i class='fa fa-trash'></i></td>";
				echo "</tr>";
			//	echo "</tbody>";
			}
		}
 	?>
<tfoot>
				<tr>
				<th>ID</th>
				<th>Customer Name</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Credit Limit</th>
				<th>Opening Balance</th>
				<th>Customer Area</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
</tfoot>
		</table>

		</body>
</html>