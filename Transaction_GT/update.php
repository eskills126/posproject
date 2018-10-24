<?php 
	include "..\db_connect.php";

	$id = $_POST["ino"];
	$pdate = $_POST["pdate"];
	$edata=$_POST["dcode"];
    $dcode =preg_replace('/-.*/', '', $edata);
	$adetail=$_POST["adetail"];
	$remarks=$_POST["remarks"];
//----------Creditor's information----------------------
	$cdata=$_POST["ccode"];
    $ccode =preg_replace('/-.*/', '', $cdata);
	$cdetail=$_POST["cdetail"];
	$cremarks=$_POST["cremarks"];

	$amount=$_POST["amount"];

	$sql = "update gttbl set gtid=$id, gtdate='$pdate', drcode=$dcode, drname='$adetail', drremarks='$remarks',crcode=$ccode ,crname= '$cdetail',crremarks= '$cremarks', cramount= $amount where gtid = ".$_POST["id"];
	$conn->query($sql);
 ?>