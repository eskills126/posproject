<?php 
include "..\db_connect.php";
 ?>
 <?php 

 $dbHost = 'localhost';
  $dbUsername = 'root';
  $dbPassword = '';
  $dbName = 'aansoftdb';

$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

   $searchTerm = $_GET['term'];

   //get matched data from table
   $query = $db->query("SELECT * FROM `salareatbl` WHERE SalAreaId LIKE  '%".$searchTerm."%' OR SalAreaTitle LIKE '%".$searchTerm."%'");
   while ($row = $query->fetch_assoc()) {
     $data[] = $row['SalAreaTitle'];
     //$data[] = $row['id'];
  }
   //return json data
     echo json_encode($data);
?>