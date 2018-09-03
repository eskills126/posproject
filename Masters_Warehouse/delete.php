<?php 
	include "..\db_connect.php";
	$sql = "delete from wharehousetbl where WarehouseId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 