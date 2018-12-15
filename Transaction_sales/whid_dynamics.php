<?php 
include "../db_connect.php";
?>
<?php
$edata=$_POST["warehouse_name"];
//$result = $edata;
$result =preg_replace('/.*-/', '', $edata);
//$result = preg_replace("/[^0-9]+/","", $edata);
//$result = preg_replace("/[^a-z A-Z]+/","", $edata);//Here we add those characters that we want to keep i.e, a to z, A to Z and a space, While those we dont want to keep, we don't write here like 0 to 9 , - etc.

//if(isset($_POST["name"]) && !empty($_POST["name"])){
	if(isset($result) && !empty($result)){
		$sql = "SELECT * From wharehousetbl WHERE WarehouseName LIKE '".$result."' ";

	$result = mysqli_query($conn,$sql);

		if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo $row["WarehouseId"];
				}
		}else{
			echo "No Results";
		}

		}
?>