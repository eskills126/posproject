<?php 
	include "..\db_connect.php";
	$name=$_POST["wname"];


$sql = "update wharehousetbl set WarehouseName='$name' where WarehouseId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 