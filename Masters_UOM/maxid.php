<?php 
	include "..\db_connect.php";
$sql2 = "SELECT * FROM uomtbl where UomId=(SELECT max(UomId) FROM uomtbl) GROUP by UomId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        	echo $row["UomId"]+1;
				}

}else{

			echo "4001";
		}

	?>