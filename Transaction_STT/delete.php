<?php 
	include "..\db_connect.php";
	$sql = "delete from purchaseorderdetailtbl where PurAutoId = ".$_POST["id"];
	$conn->query($sql);
 ?>