<?php 
	include "../db_connect.php";
	$sql = "delete from tbl_order_item where order_item_id = ".$_POST["id"];
	$conn->query($sql);
 ?>