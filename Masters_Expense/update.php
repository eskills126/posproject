<?php 
	include "..\db_connect.php";
	$name=$_POST["ename"];
	$ob=$_POST["ob"];

$sql = "update exptbl set ExpTitle='$name',ExpOpenBal=$ob where ExpId = ".$_POST["id"];
	$conn->query($sql);
 ?>
 