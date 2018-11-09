<?php

include('db_connect.php');

$sql="SELECT * FROM salesitemtbl";

$result = mysqli_query($conn,$sql);

$json_array = array();

while ($row = mysqli_fetch_assoc($result))
 {
	$json_array[]=$row;
	json_encode($json_array);
}

$fp = fopen('proId.json', 'w');
fwrite($fp, json_encode($json_array));
fclose($fp);
?>