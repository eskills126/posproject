<?php 
	include "..\db_connect.php";
$sql2 = "SELECT * FROM salesitemgrouptbl where ProGroupId=(SELECT max(ProGroupId) FROM salesitemgrouptbl) GROUP by ProGroupId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        	echo $row["ProGroupId"]+1;
				}

}else{

			echo "2001";
		}

	?>