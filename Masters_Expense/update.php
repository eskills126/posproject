<?php 
	include "..\db_connect.php";
	include '..\navbar.php';
	$eid=$_POST["eid"];
	$name=$_POST["ename"];
	$ob=$_POST["ob"];

$sql = "update exptbl set ExpId=$eid, ExpTitle='$name',ExpOpenBal=$ob,UserName='{$_SESSION['user_name']}' where ExpId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 