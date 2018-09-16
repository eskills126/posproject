<?php
session_start();
if(!isset($_SESSION['user_session'])){
  header("Location: index.php");
}

include_once("db_connect.php");
$sql = "SELECT uid, user, pass, email FROM users WHERE uid='".$_SESSION['user_session']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$row = mysqli_fetch_assoc($resultset);

?>
<!DOCTYPE html>
<html>
  
  <body>
  	
<div style="text-align: right; font-size: 12px;font-family:Arial, Helvetica, sans-serif; margin: 5px;overflow: none;">


  <div class="dropdown" id="logininfo"> 
  <a href="#"style="text-decoration: none;"><i class="fa fa-fw fa-search"></i> Search &nbsp</a> 
  <a href="#"style="text-decoration: none;"><i class="fa fa-fw fa-envelope"></i> Contacts &nbsp</a>
  

  <a href="#" class="dropdown-toggle" data-toggle="dropdown"style="text-decoration: none;"><i class="fa fa-fw fa-user"></i> Welcome <?php echo $row['user']; ?>&nbsp;<span class="caret"></span></a>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i> View Profile</a>
    <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp</i>Sign Out</a>

  </div>

</div>
</div>
</body>
</html>
