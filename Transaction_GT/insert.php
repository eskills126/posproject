<?php 
//session_start();
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

		
$sql = "INSERT INTO gttbl(gtid,gtdate,drcode,drname,drremarks,crcode,crname,crremarks,cramount) VALUES({$id},'{$pdate}',{$dcode},'{$adetail}','{$remarks}',{$ccode},'{$cdetail}','{$cremarks}',{$amount})";
	$conn->query($sql);

	$id = $conn->insert_id;

echo "<td>{$id}</td>";
echo "<td>{$pdate}</td>";
echo "<td>{$dcode}</td>";
echo "<td>{$adetail}</td>";
echo "<td>{$remarks}</td>";

echo "<td>{$ccode}</td>";
echo "<td>{$cdetail}</td>";
echo "<td>{$cremarks}</td>";

echo "<td>{$amount}</td>";


echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$id}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$id}'><i class='fa fa-trash'></i></td>";
 ?>
 