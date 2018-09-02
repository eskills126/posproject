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
   $query = $conn->query("SELECT * FROM `uomtbl` WHERE UomId LIKE  '%".$searchTerm."%' OR UomName LIKE '%".$searchTerm."%'");
   while ($row = $query->fetch_assoc()) {
     $data[] =$row['UomName'];

     //$data[] = $row['id'];
  }
   //return json data
     echo json_encode($data);
?>