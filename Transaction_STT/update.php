<?php 
	include "..\db_connect.php";
					//$idn = $_POST["idn"];
					$ino	=	$_POST["ino"];
					$pdate	=	$_POST["pdate"];
					$scode	=	$_POST["scode"];
					$sname	=	$_POST["sname"];
					$sbal	=	$_POST["sbal"];
					$icode	=	$_POST["icode"];
					$iname	=	$_POST["iname"];
					$wcode	=	$_POST["wcode"];
					$wname	=	$_POST["wname"];
					$qty	=	$_POST["qty"];
					$sqty	=	$_POST["sqty"];
					$grate	=	$_POST["grate"];
					$gamount=	$_POST["gamount"];
					$disrate=	$_POST["disRate"];
					$dvalue	=	$_POST["dvalue"];
					$disdrate=	$_POST["disdrate"];
					$rate	=	$_POST["rate"];
					$amount	=	$_POST["amount"];
					$did	=	$_POST["did"];
					$remarks=	$_POST["remarks"];

$sql = "update purchaseorderdetailtbl set PurOrderId=$ino,PurDate='$pdate',PurSupCode=$scode,PurSupCodeName='$sname',PurSupBal=$sbal, PurItemCode=$icode, PurItemName='$iname', PurWHCode=$wcode, PurWHName='$wname', PurQty=$qty, PurStockQty=$sqty,  PurGrossRate=$grate, PurGrossAmount=$gamount, PurDiscInPercent=$disrate, PurDiscValueInRate=$dvalue, PurDiscRate=$disdrate,PurRate=$rate, PurAmount=$amount, DisplayID='$did', PurRemarks='$remarks' where PurAutoId = ".$_POST['idn'];

	$conn->query($sql);
 ?>