<?php 
//session_start();
include "config.php";
	$name=$_POST["name"];
	$age=$_POST["age"];
	$city=$_POST["city"];


$sql = "INSERT INTO user(NAME,AGE,CITY) VALUES('{$name}',{$age},'{$city}')";
	$con->query($sql);

	$id = $con->insert_id;

echo "<td>{$name}</td>";
echo "<td>{$age}</td>";
echo "<td>{$city}</td>";
echo "<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$id}'><i class='fa fa-edit'></i></td>";
echo "<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$id}'><i class='fa fa-trash'></i></td>";
/*
 	if ($con->query($sql)) {
 		echo "Data Saved";
 	} else {
 		echo "Not Saved Successfully";
 	}
 */	

 ?>