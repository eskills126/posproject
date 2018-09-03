<?php 
	include "..\db_connect.php";
	$name=$_POST["igname"];


$sql = "update salesitemgrouptbl set ProGroupTitle='$name' where ProGroupId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 