<?php 
//session_start();
include "..\db_connect.php";
	$aid=$_POST["aid"];
	$name=$_POST["aname"];
	$address=$_POST["aaddress"];
	$contact=$_POST["acontact"];
	$ob=$_POST["ob"];

	
$sql = "INSERT INTO assettbl(AssId,AssTitle,AssAddress,AssContact,AssOpenBal) VALUES({$aid},'{$name}','{$address}','{$contact}',{$ob})";
	$conn->query($sql);

	$id = $conn->insert_id;

echo "<td>{$id}</td>";
echo "<td>{$name}</td>";
echo "<td>{$address}</td>";
echo "<td>{$contact}</td>";
echo "<td>{$ob}</td>";



echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$id}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$id}'><i class='fa fa-trash'></i></td>";
 ?>