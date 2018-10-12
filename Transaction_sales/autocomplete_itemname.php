<?php 
//include "..\db_connect.php";
include "database_connection.php";
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
   $query = $conn->query("SELECT * FROM `stockqty` WHERE id LIKE  '%".$searchTerm."%' OR item_name LIKE '%".$searchTerm."%'");
   while ($row = $query->fetch_assoc()) {
     $data[] = $row['id'].'-'.$row['item_name'];
     //$data[] = $row['id'];
  }
   //return json data
     echo json_encode($data);
?>