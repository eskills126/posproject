<?php 
	include "..\db_connect.php";
	$sql = "delete from suptbl where SupId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 