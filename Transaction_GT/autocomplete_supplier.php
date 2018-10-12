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
*/
   $searchTerm = $_GET['term'];

   //get matched data from table
   $query = $conn->query("SELECT * FROM `suptbl` WHERE SupId LIKE  '%".$searchTerm."%' OR SupName LIKE '%".$searchTerm."%'");
   while ($row = $query->fetch_assoc()) {
     $data[] = $row['SupId'].'-'.$row['SupName'];
     //$data[] = $row['SupName'];
  }
   //return json data
     echo json_encode($data);
?>