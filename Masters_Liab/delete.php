<?php 
	include "..\db_connect.php";
	$sql = "delete from liabtbl where LiabId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 