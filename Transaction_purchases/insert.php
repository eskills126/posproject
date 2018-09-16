<?php

//$connect = new PDO("mysql:host=localhost;dbname=aansoftdb", "root", "");

include "..\db_connect.php";

//$date =$_POST["pdate"];
$query = "
INSERT INTO purchaseorderdetailtbl
(PurOrderId,PurDate, PurSupCode, PurSupCodeName, PurSupBal, PurItemCode, PurItemName, PurWHCode, PurWHName, PurQty, PurGrossRate, PurGrossAmount, PurStockQty, PurSaleQty, PurDiscInPercent, PurDiscValueInRate, PurDiscRate, PurAmount, DisplayID, PurRemarks) 
VALUES (:ino, :pdate, :scode, :sname, :sbal, :icode, :iname, :wcode, :wname, :qty, :sqty, :grate, :gamount, :disrate, :dvalue, :disdrate, :rate, :amount, :did, :remarks)";

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
					':grate'	=>	$_POST['grate'][$count],
					':gamount'	=>	$_POST['gamount'][$count],
					':disrate'	=>	$_POST['disrate'][$count],
					':dvalue'	=>	$_POST['dvalue'][$count],
					':disdrate'	=>	$_POST['disdrate'][$count],
					':rate'	=>	$_POST['rate'][$count],
					':amount'	=>	$_POST['amount'][$count],
					':did'	=>	$_POST['did'][$count],
					':remarks'	=>	$_POST['remarks'][$count]

	//	':first_name'	=>	$_POST['hidden_first_name'][$count],
	//	':last_name'	=>	$_POST['hidden_last_name'][$count]
	);
	$statement = $connect->prepare($query);
	$statement->execute($data);
}

?>