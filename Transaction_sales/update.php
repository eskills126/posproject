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
					$prate	=	$_POST["prate"];
					$grate	=	$_POST["grate"];
					$gamount=	$_POST["gamount"];
					$did	=	$_POST["did"];
					$remarks=	$_POST["remarks"];

$sql = "update salesorderdetailtbl set SaleOrderId=$ino,SaleDate='$pdate',SaleCusCode=$scode,SaleCusCodeName='$sname',SaleCusBal=$sbal, SaleItemCode=$icode, SaleItemName='$iname', SaleWHCode=$wcode, SaleWHName='$wname', SaleQty=$qty, SaleStockQty=$sqty, SalePreviousRate=$prate,  SaleGrossRate=$grate, SaleGrossAmount=$gamount, DisplayID='$did', SaleRemarks='$remarks' where SaleAutoId = ".$_POST['idn'];

	$conn->query($sql);
 ?>