<?php 
include "..\db_connect.php";
?>
<?php
$edata=$_POST["carea"];
$result = $edata;
//$result = preg_replace("/[^a-z A-Z]+/","", $edata);//Here we add those characters that we want to keep i.e, a to z, A to Z and a space, While those we dont want to keep, we don't write here like 0 to 9 , - etc.

//if(isset($_POST["name"]) && !empty($_POST["name"])){
	if(isset($result) && !empty($result)){
	$sql = 'SELECT SalAreaId,SalAreaTitle FROM salareatbl WHERE SalAreaTitle LIKE  "'.$result.'" ';
	$result = mysqli_query($conn,$sql);
	//$query = $db->query("SELECT * FROM customers WHERE name = ".$_POST['name']." GROUP BY name ");
	//$rowcount = $query->num_rows;
	//if ($rowcount > 0) {
		// echo "<input type = "text" placeholder="Naeem Ahmed">";
	//	while ($row=$query->fetch_assoc()) {
	//		echo $row['id'];
			//echo '<input type="text" value="'.$row['id'].'">';
	
		if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo $row["SalAreaTitle"];
				}
		}else{
			echo "0";
		}

		}
?>