<?php 
	include "..\db_connect.php";
	$name=$_POST["itname"];


$sql = "update salesproducttypetbl set ProductTypeName='$name' where ProductTypeId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 