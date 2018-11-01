<?php 
	include "..\db_connect.php";
$sql2 = "SELECT * FROM salesproducttypetbl where ProductTypeId=(SELECT max(ProductTypeId) FROM salesproducttypetbl) GROUP by ProductTypeId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        	echo $row["ProductTypeId"]+1;
				}

}else{

			echo "1001";
		}

	?>