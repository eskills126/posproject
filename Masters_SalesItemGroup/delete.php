<?php 
	include "..\db_connect.php";
	$sql = "delete from salesitemgrouptbl where ProGroupId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 