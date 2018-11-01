<?php 
	include "..\db_connect.php";
$sql2 = "SELECT * FROM salesitemtbl where ProId=(SELECT max(ProId) FROM salesitemtbl) GROUP by ProId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        	echo $row["ProId"]+1;
				}

}else{

			echo "80001";
		}

	?>