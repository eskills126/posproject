<?php 
	include 'config.php';
	$sql = "delete from user where id = ".$_POST["id"];
	$con->query($sql);
 ?>