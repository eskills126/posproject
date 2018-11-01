<?php 
//session_start();
include "..\db_connect.php";
	$sid =$_POST["sid"];
	$name=$_POST["sname"];
	$address=$_POST["saddress"];
	$contact=$_POST["scontact"];
	$sopbal=$_POST["sopbal"];
	
	
$sql = "INSERT INTO suptbl(SupId,SupName,SupAddress,SupContact,SupOpenBal) VALUES({$sid},'{$name}','{$address}','{$contact}',{$sopbal})";
	$conn->query($sql);

	$id = $conn->insert_id;

echo "<td>{$id}</td>";
echo "<td>{$name}</td>";
echo "<td>{$address}</td>";
echo "<td>{$contact}</td>";

echo "<td>{$sopbal}</td>";


echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$id}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$id}'><i class='fa fa-trash'></i></td>";
 ?>
 