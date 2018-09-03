<?php 
	include "..\db_connect.php";
	$name=$_POST["uom"];


$sql = "update uomtbl set UomName='$name' where UomId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 