<?php

//$connect = new PDO("mysql:host=localhost;dbname=aansoftdb", "root", "");

include "..\db_connect.php";

//$date =$_POST["pdate"];
$query = "
INSERT INTO salesorderdetailtbl
(SaleOrderId,SaleDate, SaleCusCode, SaleCusCodeName, SaleCusBal, SaleItemCode, SaleItemName, SaleWHCode, SaleWHName, SaleQty, SaleStockQty, SalePreviousRate,SaleGrossRate, SaleGrossAmount, DisplayID, SaleRemarks) 
VALUES (:ino, :pdate, :scode, :sname, :sbal, :icode, :iname, :wcode, :wname, :qty, :sqty, :prate, :grate, :gamount, :did, :remarks)";

for($count = 0; $count<count($_POST['ino']); $count++)
{
	$data = array(
					':ino'	=>	$_POST['ino'][$count],
					':pdate'	=>	$_POST['pdate'][$count],
					':scode'	=>	$_POST['scode'][$count],
					':sname'	=>	$_POST['sname'][$count],
					':sbal'	=>	$_POST['sbal'][$count],
					':icode'	=>	$_POST['icode'][$count],
					':iname'	=>	$_POST['iname'][$count],
					':wcode'	=>	$_POST['wcode'][$count],
					':wname'	=>	$_POST['wname'][$count],
					':qty'	=>	$_POST['qty'][$count],
					':sqty'	=>	$_POST['sqty'][$count],
					':prate'	=>	$_POST['prate'][$count],
					':grate'	=>	$_POST['grate'][$count],
					':gamount'	=>	$_POST['gamount'][$count],
					':did'	=>	$_POST['did'][$count],
					':remarks'	=>	$_POST['remarks'][$count]

	//	':first_name'	=>	$_POST['hidden_first_name'][$count],
	//	':last_name'	=>	$_POST['hidden_last_name'][$count]
	);
	$statement = $connect->prepare($query);
	$statement->execute($data);
}

?>