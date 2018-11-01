<?php 
	include "..\db_connect.php";
	$sid =$_POST["sid"]; 
	$name=$_POST["pname"];
	$uom=$_POST["uom"];
	$oqu=$_POST["oqu"];
	$orat=$_POST["orat"];
	$ob=$_POST["ob"];
	$sr=$_POST["sr"];
	$itn=$_POST["itn"];

	$sql = "update salesitemtbl set ProId=$sid,ProName='$name',ProUomName='$uom',ProOpenQtyUnit=$oqu,ProOpenRate=$orat,ProOpenBal=$ob,ProSalesRate=$sr,ProItemGroupName='$itn' where ProId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 