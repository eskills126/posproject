<?php 
	include "..\db_connect.php";
	$sql = "delete from users where uid = ".$_POST["id"];
	$conn->query($sql);
 ?>
 