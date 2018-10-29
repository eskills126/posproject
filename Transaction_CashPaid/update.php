<?php 
	include "..\db_connect.php";

	$id = $_POST["ino"];
	$pdate = $_POST["pdate"];
	$edata=$_POST["acode"];
    $acode =preg_replace('/-.*/', '', $edata);

	$adetail=$_POST["adetail"];
	$remarks=$_POST["remarks"];
	$amount=$_POST["amount"];

	$sql = "update cashpaidtbl set cashid=$id, cashdate='$pdate', payercode=$acode, payername='$adetail', remarks='$remarks', amountpaid=$amount where cashid = ".$_POST["id"];
	$conn->query($sql);
 ?>