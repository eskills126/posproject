<?php 
	include "..\db_connect.php";
	include '..\navbar.php';
	$cid =$_POST["cid"]; 
	$name=$_POST["cname"];
	$address=$_POST["caddress"];
	$contact=$_POST["ccontac"];
	$climit=$_POST["climit"];
	$copbal=$_POST["copbal"];
	$carea=$_POST["carea"];

	$sql = "update customertbl set CusId=$cid, CusName='$name',CusAddress='$address',CusContact='$contact',CusCreditLimit='$climit',CusOpenBal=$copbal,CusAreaName='$carea',UserName='{$_SESSION['user_name']}' where CusId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 