<?php 
	include "..\db_connect.php";
	include '..\navbar.php';
	$sid =$_POST["sid"]; 
	$name=$_POST["pname"];
	$uom=$_POST["uom"];
	$oqu=$_POST["oqu"];
	$orat=$_POST["orat"];
	$ob=$_POST["ob"];
	$sr=$_POST["sr"];
	$itn=$_POST["itn"];

	$sql = "update salesitemtbl set ProId=$sid,ProName='$name',ProUomName='$uom',ProOpenQtyUnit=$oqu,ProOpenRate=$orat,ProOpenBal=$ob,ProSalesRate=$sr,ProItemGroupName='$itn',UserName='{$_SESSION['user_name']}' where ProId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 