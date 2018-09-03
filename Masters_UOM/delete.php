<?php 
	include "..\db_connect.php";
	$sql = "delete from uomtbl where UomId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 