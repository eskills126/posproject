<?php 
//session_start();
include "..\db_connect.php";
	$name=$_POST["uname"];
	$password=$_POST["upassword"];
	$rpassword=$_POST["rpassword"];
	$email=$_POST["uemail"];
	$type=$_POST["utype"];
	

	

	
$sql = "INSERT INTO users(user,pass,retype_pass,email,user_role) VALUES('{$name}','{$password}','{$rpassword}','{$email}',{$type})";
	$conn->query($sql);

	$id = $conn->insert_id;

echo "<td>{$id}</td>";
echo "<td>{$name}</td>";
echo "<td>{$password}</td>";
echo "<td>{$rpassword}</td>";
echo "<td>{$email}</td>";
echo "<td>{$type}</td>";




echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$id}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$id}'><i class='fa fa-trash'></i></td>";
 ?>
 