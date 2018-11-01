<?php 
	include "..\db_connect.php";
$sql2 = "SELECT * FROM wharehousetbl where WarehouseId=(SELECT max(WarehouseId) FROM wharehousetbl) GROUP by WarehouseId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        	echo $row["WarehouseId"]+1;
				}

}else{

			echo "3001";
		}

	?>