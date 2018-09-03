<?php 
//session_start();
include "..\db_connect.php";
	$name=$_POST["igname"];
	

	
$sql = "INSERT INTO salesitemgrouptbl(ProGroupTitle) VALUES('{$name}')";
	$conn->query($sql);

	$id = $conn->insert_id;

echo "<td>{$id}</td>";
echo "<td>{$name}</td>";




echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$id}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$id}'><i class='fa fa-trash'></i></td>";
 ?>
 