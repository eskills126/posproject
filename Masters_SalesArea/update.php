<?php 
	include "..\db_connect.php";
	include '..\navbar.php';
	$said=$_POST["said"];
	$name=$_POST["aname"];


$sql = "update salareatbl set SalAreaId=$said, SalAreaTitle='$name',UserName='{$_SESSION['user_name']}' where SalAreaId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 