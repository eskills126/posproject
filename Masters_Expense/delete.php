<?php 
	include "..\db_connect.php";
	$sql = "delete from exptbl where ExpId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 