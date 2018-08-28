<?php 
	include "..\db_connect.php";
	$name=$_POST["cname"];
	$address=$_POST["caddress"];
	$contact=$_POST["ccontac"];
	$climit=$_POST["climit"];
	$copbal=$_POST["copbal"];
	$carea=$_POST["carea"];

	$sql = "update customertbl set CusName='$name',CusAddress='$address',CusContact='$contact',CusCreditLimit=$climit,CusOpenBal=$copbal,CusAreaName=$carea where CusId = ".$_POST["id"];
	$conn->query($sql);
 ?>