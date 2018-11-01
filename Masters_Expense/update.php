<?php 
	include "..\db_connect.php";
	$eid=$_POST["eid"];
	$name=$_POST["ename"];
	$ob=$_POST["ob"];

$sql = "update exptbl set ExpId=$eid, ExpTitle='$name',ExpOpenBal=$ob where ExpId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 