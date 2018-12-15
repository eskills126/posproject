<?php 
	include "..\db_connect.php";
$sql2 = "SELECT * FROM salareatbl where SalAreaId=(SELECT max(SalAreaId) FROM salareatbl) GROUP by SalAreaId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        	echo $row["SalAreaId"]+1;
				}

}else{

			echo "1";
		}

	?>