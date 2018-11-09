<?php 
	include "..\db_connect.php";
	include '..\navbar.php';
	$stid=$_POST["stid"];
	$name=$_POST["itname"];


$sql = "update salesproducttypetbl set ProductTypeId=$stid, ProductTypeName='$name',UserName='{$_SESSION['user_name']}' where ProductTypeId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 