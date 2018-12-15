<?php 
	include "..\db_connect.php";
	include '..\navbar.php';
	$sid =$_POST["sid"];
	$name=$_POST["sname"];
	$address=$_POST["saddress"];
	$contact=$_POST["scontact"];
	$sopbal=$_POST["sopbal"];

	$sql = "update suptbl set SupId=$sid,SupName='$name',SupAddress='$address',SupContact='$contact',SupOpenBal=$sopbal,UserName='{$_SESSION['user_name']}' where SupId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 