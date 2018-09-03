<?php 
	include "..\db_connect.php";
	$name=$_POST["aname"];
	$address=$_POST["aaddress"];
	$contact=$_POST["acontact"];
	$ob=$_POST["ob"];

$sql = "update assettbl set AssTitle='$name',AssAddress='$address',AssContact='$contact',AssOpenBal=$ob where AssId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 