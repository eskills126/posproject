<?php 
include "../db_connect.php";
//include "db_connect.php";
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
   $query = $conn->query("SELECT * FROM `customertbl` WHERE CusId LIKE  '%".$searchTerm."%' OR CusName LIKE '%".$searchTerm."%'");
   while ($row = $query->fetch_assoc()) {
     $data[] = $row['CusId'].'-'.$row['CusName'];
     //$data[] = $row['id'];
  }
   //return json data
     echo json_encode($data);
?>