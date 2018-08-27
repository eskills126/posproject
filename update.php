<?php 
	include 'config.php';
	$sql = "update user set name='{$_POST["name"]}',age={$_POST["age"]},city='{$_POST["city"]}' where id = ".$_POST["id"];
	$con->query($sql);
 ?>