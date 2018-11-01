<?php 
	include "..\db_connect.php";
	$wid=$_POST["wid"];
	$name=$_POST["wname"];


$sql = "update wharehousetbl set WarehouseId=$wid, WarehouseName='$name' where WarehouseId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 