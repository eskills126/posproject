<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "addpakistan";
$dbname = "aansoftdb";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
<?php 
// PDO Code for /Transaction_Purchases/insert.php
$connect = new PDO("mysql:host=localhost;dbname=aansoftdb", "root", "addpakistan");
 ?>