<?php 
	include "..\db_connect.php";
	$sql = "delete from cashpaidtbl where cashid = ".$_POST["id"];
	$conn->query($sql);
 ?>
 