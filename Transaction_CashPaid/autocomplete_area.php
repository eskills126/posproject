<?php 
include "..\db_connect.php";
 ?>
 <?php 
/*
 $dbHost = 'localhost';
  $dbUsername = 'root';
  $dbPassword = '';
  $dbName = 'aansoftdb';
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
WHERE SupName LIKE  '%".$searchTerm."%' OR SalAreaTitle LIKE '%".$searchTerm."%'");
syntax of creating view
    Create View abc AS
    SELECT AssTitle FROM assettbl
    UNION
    SELECT CusName FROM  customertbl
    UNION
    SELECT ExpTitle FROM exptbl 
    UNION
    SELECT LiabTitle FROM liabtbl 
    UNION
    SELECT SupName FROM suptbl
*/
   $searchTerm = $_GET['term'];

   //get matched data from table
   $query = $conn->query("
    SELECT * From uniontbl_cp_cr
WHERE AssId LIKE  '%".$searchTerm."%' OR AssTitle LIKE '%".$searchTerm."%'");

   while ($row = $query->fetch_assoc()) {
     $data[] = $row['AssId'].'-'.$row['AssTitle'];
     //$data[] = $row['id'];
  }
   //return json data
     echo json_encode($data);
?>