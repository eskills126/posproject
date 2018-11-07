<?php 
//session_start();
include "..\db_connect.php";
include '..\navbar.php';
	$sid =$_POST["sid"]; 
	$name=$_POST["pname"];
	$uom=$_POST["uom"];
	$oqu=$_POST["oqu"];
	$orat=$_POST["orat"];
	$ob=$_POST["ob"];
	$sr=$_POST["sr"];
	$itn=$_POST["itn"];
	
$sql = "INSERT INTO salesitemtbl(ProId,ProName,ProUomName,ProOpenQtyUnit,ProOpenRate,ProOpenBal,ProSalesRate,ProItemGroupName,UserName) VALUES({$sid},'{$name}','{$uom}',{$oqu},{$orat},{$ob},{$sr},'{$itn}','{$_SESSION['user_name']}')";
	$conn->query($sql);

	$id = $conn->insert_id;

echo "<td>{$id}</td>";
echo "<td>{$name}</td>";
echo "<td>{$uom}</td>";
echo "<td>{$oqu}</td>";
echo "<td>{$orat}</td>";
echo "<td>{$ob}</td>";
echo "<td>{$sr}</td>";
echo "<td>{$itn}</td>";


echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$id}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$id}'><i class='fa fa-trash'></i></td>";
 ?>
 