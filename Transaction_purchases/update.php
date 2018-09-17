<?php 
	include "..\db_connect.php";
	/*
	$name=$_POST["cname"];
	$address=$_POST["caddress"];
	$contact=$_POST["ccontac"];
	$climit=$_POST["climit"];
	$copbal=$_POST["copbal"];
	$carea=$_POST["carea"];
*/
					$ino	=	$_POST['ino'];
					$pdate	=	$_POST['pdate'];
					$scode	=	$_POST['scode'];
					$sname	=	$_POST['sname'];
					$sbal	=	$_POST['sbal'];
					$icode	=	$_POST['icode'];
					$iname	=	$_POST['iname'];
					$wcode	=	$_POST['wcode'];
					$wname	=	$_POST['wname'];
					$qty	=	$_POST['qty'];
					$sqty	=	$_POST['sqty'];
					$grate	=	$_POST['grate'];
					$gamount=	$_POST['gamount'];
					$disrate=	$_POST['disrate'];
					$dvalue	=	$_POST['dvalue'];
					$disdrate=	$_POST['disdrate'];
					$rate	=	$_POST['rate'];
					$amount	=	$_POST['amount'];
					$did	=	$_POST['did'];
					$remarks=	$_POST['remarks'];

$sql = "update purchaseorderdetailtbl set PurOrderId=$ino,PurDate='$pdate',PurSupCode=$scode,PurSupCodeName='$sname',PurSupBal=$sbal, PurItemCode=$icode, PurItemName='$iname', PurWHCode=$wcode, PurWHName='$wname', PurQty=$qty, PurStockQty=$sqty,  PurGrossRate=$grate, PurGrossAmount=$gamount, PurDiscInPercent=$disrate, PurDiscValueInRate=$dvalue, PurDiscRate=$disdrate,PurRate=$rate, PurAmount=$amount, DisplayID='$did', PurRemarks='$remarks' where PurOrderId = ".$_POST["ino"];

/*
	$sql = "update customertbl set CusName='$name',CusAddress='$address',CusContact='$contact',CusCreditLimit='$climit',CusOpenBal=$copbal,CusAreaName='$carea' where CusId = ".$_POST["id"];
*/

	$conn->query($sql);
 ?>
 