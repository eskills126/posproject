<?php 
//session_start();
include "..\db_connect.php";
	$lid=$_POST["lid"];
	$name=$_POST["lname"];
	$address=$_POST["laddress"];
	$contact=$_POST["lcontact"];
	$ob=$_POST["ob"];

	
$sql = "INSERT INTO liabtbl(LiabId,LiabTitle,LiabAddress,LiabContact,LiabOpenBal) VALUES({$lid},'{$name}','{$address}','{$contact}',{$ob})";
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