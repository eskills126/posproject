<?php 
	include "..\db_connect.php";
$sql2 = "SELECT * FROM exptbl where ExpId=(SELECT max(ExpId) FROM exptbl) GROUP by ExpId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        	echo $row["ExpId"]+1;
				}

}else{

			echo "50001";
		}

	?>