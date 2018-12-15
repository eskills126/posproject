<?php 
//session_start();
include "..\db_connect.php";
	
	$id = $_POST["ino"];
	$pdate = $_POST["pdate"];
	$edata=$_POST["acode"];
    $acode =preg_replace('/-.*/', '', $edata);

	$adetail=$_POST["adetail"];
	$remarks=$_POST["remarks"];
	$amount=$_POST["amount"];

		
$sql = "INSERT INTO cashreceivetbl(cashrid,cashrdate,receivercode,receivername,remarks,receiveamount) VALUES({$id},'{$pdate}',{$acode},'{$adetail}','{$remarks}',{$amount})";
	$conn->query($sql);

	$id = $conn->insert_id;

echo "<td>{$id}</td>";
echo "<td>{$pdate}</td>";
echo "<td>{$acode}</td>";
echo "<td>{$adetail}</td>";
echo "<td>{$remarks}</td>";
echo "<td>{$amount}</td>";


echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$id}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$id}'><i class='fa fa-trash'></i></td>";
 ?>
 