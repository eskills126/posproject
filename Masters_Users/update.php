<?php 
	include "..\db_connect.php";
	$name=$_POST["uname"];
	$password=$_POST["upassword"];
	$rpassword=$_POST["rpassword"];
	$email=$_POST["uemail"];
	$type=$_POST["utype"];


$sql = "update users set user='$name',pass='$password',retype_pass='$rpassword',email='$email',user_role=$type where uid = ".$_POST["id"];
	$conn->query($sql);
 ?>
 