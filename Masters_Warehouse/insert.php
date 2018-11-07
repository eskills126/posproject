<?php 
//session_start();
include "..\db_connect.php";
include '..\navbar.php';
	$wid=$_POST["wid"];
	$name=$_POST["wname"];
	

	
$sql = "INSERT INTO wharehousetbl(WarehouseId,WarehouseName,UserName) VALUES({$wid},'{$name}','{$_SESSION['user_name']}')";
	$conn->query($sql);

	$id = $conn->insert_id;

echo "<td>{$id}</td>";
echo "<td>{$name}</td>";




echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$id}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$id}'><i class='fa fa-trash'></i></td>";
 ?>
 