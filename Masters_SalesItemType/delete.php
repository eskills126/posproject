<?php 
	include "..\db_connect.php";
	$sql = "delete from salesproducttypetbl where ProductTypeId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 