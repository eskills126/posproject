<?php 
	include "..\db_connect.php";
	include '..\navbar.php';
	$wid=$_POST["wid"];
	$name=$_POST["wname"];


$sql = "update wharehousetbl set WarehouseId=$wid, WarehouseName='$name',UserName='{$_SESSION['user_name']}' where WarehouseId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 