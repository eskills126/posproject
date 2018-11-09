<?php 
	include "..\db_connect.php";
	include '..\navbar.php';
	$sgid=$_POST["sgid"];
	$name=$_POST["igname"];


$sql = "update salesitemgrouptbl set ProGroupId=$sgid, ProGroupTitle='$name',UserName='{$_SESSION['user_name']}' where ProGroupId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 