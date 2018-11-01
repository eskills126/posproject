<?php 
	include "..\db_connect.php";
$sql2 = "SELECT * FROM customertbl where CusId=(SELECT max(CusId) FROM customertbl) GROUP by CusId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        	echo $row["CusId"]+1;
				}

}else{

			echo "40001";
		}

	?>