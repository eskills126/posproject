<?php 
	include "../db_connect.php";
	$sql = "delete from tbl_order_item_purchase where order_item_id = ".$_POST["id"];
	$conn->query($sql);
 ?>