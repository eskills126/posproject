<?php 
	include "..\db_connect.php";
	include '..\navbar.php';
	$aid=$_POST["aid"];
	$name=$_POST["aname"];
	$address=$_POST["aaddress"];
	$contact=$_POST["acontact"];
	$ob=$_POST["ob"];

$sql = "update assettbl set AssId=$aid, AssTitle='$name',AssAddress='$address',AssContact='$contact',AssOpenBal=$ob,UserName='{$_SESSION['user_name']}' where AssId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 