<?php 
	include "..\db_connect.php";

	$uid=$_POST["uid"];
	$name=$_POST["uom"];


$sql = "update uomtbl set UomId=$uid, UomName='$name' where UomId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 