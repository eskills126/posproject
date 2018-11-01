<?php 
	include "..\db_connect.php";
	$stid=$_POST["stid"];
	$name=$_POST["itname"];


$sql = "update salesproducttypetbl set ProductTypeId=$stid, ProductTypeName='$name' where ProductTypeId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 