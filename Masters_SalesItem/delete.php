<?php 
	include "..\db_connect.php";
	$sql = "delete from salesitemtbl where ProId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 