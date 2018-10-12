<?php 
	include "..\db_connect.php";
	$sql = "delete from salesorderdetailtbl where SaleAutoId = ".$_POST["id"];
	$conn->query($sql);
 ?>