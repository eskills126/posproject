<?php 
	include "..\db_connect.php";
$sql2 = "SELECT * FROM liabtbl where LiabId=(SELECT max(LiabId) FROM liabtbl) GROUP by LiabId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        	echo $row["LiabId"]+1;
				}

}else{

			echo "30001";
		}

	?>