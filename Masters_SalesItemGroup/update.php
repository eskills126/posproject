<?php 
	include "..\db_connect.php";
	$sgid=$_POST["sgid"];
	$name=$_POST["igname"];


$sql = "update salesitemgrouptbl set ProGroupId=$sgid, ProGroupTitle='$name' where ProGroupId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 