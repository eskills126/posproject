<?php 
	include "..\db_connect.php";
	$sql = "delete from gttbl where gtid = ".$_POST["id"];
	$conn->query($sql);
 ?>
 