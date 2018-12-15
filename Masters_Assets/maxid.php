<?php 
	include "..\db_connect.php";
$sql2 = "SELECT * FROM assettbl where AssId=(SELECT max(AssId) FROM assettbl) GROUP by AssId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        	echo $row["AssId"]+1;
				}

}else{

			echo "10001";
		}

	?>