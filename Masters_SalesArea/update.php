<?php 
	include "..\db_connect.php";
	$name=$_POST["aname"];


$sql = "update salareatbl set SalAreaTitle='$name' where SalAreaId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 