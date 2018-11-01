<?php 
	include "..\db_connect.php";
$sql2 = "SELECT * FROM suptbl where SupId=(SELECT max(SupId) FROM suptbl) GROUP by SupId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        	echo $row["SupId"]+1;
				}

}else{

			echo "20001";
		}

	?>