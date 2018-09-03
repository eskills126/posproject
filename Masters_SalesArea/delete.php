<?php 
	include "..\db_connect.php";
	$sql = "delete from salareatbl where SalAreaId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 