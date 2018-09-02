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
   $query = $conn->query("SELECT * FROM `salesitemgrouptbl` WHERE ProGroupId LIKE  '%".$searchTerm."%' OR ProGroupTitle LIKE '%".$searchTerm."%'");
   while ($row = $query->fetch_assoc()) {
     $data[] = $row['ProGroupTitle'];
     //$data[] = $row['id'];
  }
   //return json data
     echo json_encode($data);
?>