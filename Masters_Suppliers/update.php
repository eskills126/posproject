<?php 
	include "..\db_connect.php";
	$name=$_POST["sname"];
	$address=$_POST["saddress"];
	$contact=$_POST["scontact"];
	$sopbal=$_POST["sopbal"];

	$sql = "update suptbl set SupName='$name',SupAddress='$address',SupContact='$contact',SupOpenBal=$sopbal where SupId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 