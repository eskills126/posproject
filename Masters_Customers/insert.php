<?php 
//session_start();
include "..\db_connect.php";
include '..\navbar.php';

	$cid =$_POST["cid"]; 
	$name=$_POST["cname"];
	$address=$_POST["caddress"];
	$contact=$_POST["ccontac"];
	$climit=$_POST["climit"];
	$copbal=$_POST["copbal"];
	$carea=$_POST["carea"];
	
$sql = "INSERT INTO customertbl(CusId,CusName,CusAddress,CusContact,CusCreditLimit,CusOpenBal,CusAreaName,UserName) VALUES({$cid},'{$name}','{$address}','{$contact}','{$climit}',{$copbal},'{$carea}','{$_SESSION['user_name']}')";
	$conn->query($sql);

	$id = $conn->insert_id;

echo "<td>{$id}</td>";
echo "<td>{$name}</td>";
echo "<td>{$address}</td>";
echo "<td>{$contact}</td>";
echo "<td>{$climit}</td>";
echo "<td>{$copbal}</td>";
echo "<td>{$carea}</td>";
echo "<td>{$_SESSION['user']}</td>";


echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$id}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$id}'><i class='fa fa-trash'></i></td>";
 ?>
 