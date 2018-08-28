<?php
session_start();
if(!isset($_SESSION['user_session'])){
  header("Location: index.php");
}
include('header.php');
include_once("db_connect.php");
$sql = "SELECT uid, user, pass, email FROM users WHERE uid='".$_SESSION['user_session']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$row = mysqli_fetch_assoc($resultset);

include('navbar.php');
?>
<p>

<div class="dropdown" align="right" id="logininfo">
  <button type="button" class="btn btn-primary d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-user-circle fa-3x" aria-hidden="false">&nbsp</i>Welcome <?php echo $row['user']; ?>&nbsp;<span class="caret">
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i> View Profile</a>
    <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp</i>Sign Out</a>
  </div>
  </div>  
  </p>
	<div class='alert alert-success'>
		<button class='close' data-dismiss='alert'>&times;</button>
		Hello and Welcome to the members page.
    </div>		
<div class="container-fluid">
  <div class="row">

    <div class="col-xs-6 col-md-4" >
<a href="index1.php"> <h1 class="text-left">index1</h1></a>
    </div>

    <div class="col-xs-6 col-md-4" >
<a href="customers.php"> <h1 class="text-left">Customers</h1></a>
    </div>

    <div class="col-xs-6 col-md-4" >
<a href="example.php"><h1 class="text-left">Example</h1></a>
    </div>

    <div class="col-xs-6 col-md-4" >
<a href="suppliers.php"> <h1 class="text-left">Suppliers Form</h1></a>
</div>

<div class="col-xs-6 col-md-4" >
<a href="salesitem.php"> <h1 class="text-left">SalesItems Form</h1></a>
</div>

<div class="col-xs-6 col-md-4" >
<a href="assetform.php"> <h1 class="text-left">Assets Form</h1></a>
</div>

<div class="col-xs-6 col-md-4" >
<a href="Liabform.php"> <h1 class="text-left">Liability Form</h1></a>
</div>

<div class="col-xs-6 col-md-4" >
<a href="ExpenseForm.php"> <h1 class="text-left">Expense Form</h1></a>
</div>

<div class="col-xs-6 col-md-4" >
<a href="SalesArea.php"> <h1 class="text-left">Sales Area Form</h1></a>
</div>

<div class="col-xs-6 col-md-4" >
<a href="salesitemtype.php"> <h1 class="text-left">Sales Item Type</h1></a>
</div>

<div class="col-xs-6 col-md-4" >
<a href="salesitemgroup.php"> <h1 class="text-left">Item Product Group</h1></a>
</div>

<?php include('footer.php');?>
</div>