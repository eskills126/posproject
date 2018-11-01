<?php 
	include "..\db_connect.php";
	$said=$_POST["said"];
	$name=$_POST["aname"];


$sql = "update salareatbl set SalAreaId=$said, SalAreaTitle='$name' where SalAreaId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 