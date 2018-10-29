<?php 
	include "..\db_connect.php";

	$id = $_POST["ino"];
	$pdate = $_POST["pdate"];
	$edata=$_POST["acode"];
    $acode =preg_replace('/-.*/', '', $edata);

	$adetail=$_POST["adetail"];
	$remarks=$_POST["remarks"];
	$amount=$_POST["amount"];

	$sql = "update cashreceivetbl set cashrid=$id, cashrdate='$pdate', receivercode=$acode, receivername='$adetail', remarks='$remarks', receiveamount=$amount where cashrid = ".$_POST["id"];
	$conn->query($sql);
 ?>