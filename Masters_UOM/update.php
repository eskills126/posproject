<?php 
	include "..\db_connect.php";
	include '..\navbar.php';
	$uid=$_POST["uid"];
	$name=$_POST["uom"];


$sql = "update uomtbl set UomId=$uid, UomName='$name',UserName='{$_SESSION['user_name']}' where UomId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 