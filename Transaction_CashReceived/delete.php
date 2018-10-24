<?php 
	include "..\db_connect.php";
	$sql = "delete from cashreceivetbl where cashrid = ".$_POST["id"];
	$conn->query($sql);
 ?>
 