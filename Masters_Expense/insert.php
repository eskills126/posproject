<?php 
//session_start();
include "..\db_connect.php";
include '..\navbar.php';
	$eid=$_POST["eid"];
	$name=$_POST["ename"];
	$ob=$_POST["ob"];

	
$sql = "INSERT INTO exptbl(ExpId,ExpTitle,ExpOpenBal,UserName) VALUES({$eid},'{$name}',{$ob},'{$_SESSION['user_name']}')";
	$conn->query($sql);

	$id = $conn->insert_id;

echo "<td>{$id}</td>";
echo "<td>{$name}</td>";
echo "<td>{$ob}</td>";



echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$id}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$id}'><i class='fa fa-trash'></i></td>";
 ?>
 