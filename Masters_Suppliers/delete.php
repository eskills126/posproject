<?php 
	include "..\db_connect.php";
	$sql = "delete from customertbl where CusId = ".$_POST["id"];
	$conn->query($sql);
 ?>