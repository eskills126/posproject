<?php 
	include "..\db_connect.php";
	$lid=$_POST["lid"];
	$name=$_POST["lname"];
	$address=$_POST["laddress"];
	$contact=$_POST["lcontact"];
	$ob=$_POST["ob"];

$sql = "update liabtbl set LiabId=$lid, LiabTitle='$name',LiabAddress='$address',LiabContact='$contact',LiabOpenBal=$ob where LiabId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 