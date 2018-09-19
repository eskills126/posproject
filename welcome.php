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

<div class="container-fluid">

  <p>
    
  <div class="row">
        
  <div class="col-xs-6 col-sm-8 col-md-offset-4">
  <div style="text-align:center">
  <h2 style="font-weight: bold;">Dash Board</h2>
  <p>Click on the boxes below:</p>
  </div>
  </div>

  <div class="col-xs-6 col-sm-4">
  <div class="dropdown" align="right" id="logininfo">
  <button type="button" class="btn btn-primary d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-user-circle fa-3x" aria-hidden="false">&nbsp</i>Welcome <?php echo $row['user']; ?>&nbsp;<span class="caret"></span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i> View Profile</a>
    <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp</i>Sign Out</a>
  </div>
  </div>
  </div>
  </div> 
  <div class='alert alert-success'>
		<button class='close' data-dismiss='alert'>&times;</button>
		Hello and Welcome to the members page.
    </div>		
  </p>
  </div>
<link rel="stylesheet" href="css/DataGrid.css">

<div class="container">
<!-- Three columns -->

<div class="row">
 
    <div class="acolumn"></div>
    <div class="column" style="background:green;"> <a href="customers.php"style="color: white;">
    Customers
    <div style="font-size: 10px;">Your can add customers from here</div></a>
    </div>

    <div class="acolumn"></div>
    <div class="column" style="background:blue;"> <a href="suppliers.php"style="color: white;">
    Suppliers
    <div style="font-size: 10px;">Your can add suppliers from here</div></a>
    </div>
 
    <div class="acolumn"></div>
    <div class="column" style="background:red;"> <a href="salesitem.php"style="color: white;">
    Sales Items
    <div style="font-size: 10px;">Your can add sales item from here</div></a>
    </div>
    </div>

    <br>
    
    <div class="row"> 
    <div class="acolumn"></div>
    <div class="column" style="background:#800000;"> <a href="assetform.php"style="color: white;">
    Assets
    <div style="font-size: 10px;">Your can add assets from here</div></a>
    </div>

    <div class="acolumn"></div>
    <div class="column" style="background:#FF00FF;"> <a href="liabform.php"style="color: white;">
    Liabilities
    <div style="font-size: 10px;">Your can add liabilities from here</div></a>
    </div>
 
    <div class="acolumn"></div>
    <div class="column" style="background:#008080;"> <a href="expenseform.php"style="color: white;">
    Expenses
    <div style="font-size: 10px;">Your can add expenses from here</div></a>
    </div>
    </div>


    <br>
    
    <div class="row"> 
    <div class="acolumn"></div>
    <div class="column" style="background:#808080;"> <a href="salesarea.php"style="color: white;">
    Sales Areas
    <div style="font-size: 10px;">Your can add sales areas from here</div></a>
    </div>

    <div class="acolumn"></div>
    <div class="column" style="background:#000080;"> <a href="salesitemtype.php"style="color: white;">
    SaleItemTypes
    <div style="font-size: 10px;">Your can add SalesItem types here</div></a>
    </div>
 
    <div class="acolumn"></div>
    <div class="column" style="background:#800080;"> <a href="salesitemgroup.php"style="color: white;">
    ProductGroup
    <div style="font-size: 10px;">Your can add ItemGroup from here</div></a>
    </div>
    </div>

    <br>
    
    <div class="row"> 
    <div class="acolumn"></div>
    <div class="column" style="background:#FFC300;"> <a href="warehouse.php"style="color: white;">
    Warehouses
    <div style="font-size: 10px;">Your can add warehouse from here</div></a>
    </div>

    <div class="acolumn"></div>
    <div class="column" style="background:#4286f4;"> <a href="uom.php"style="color: white;">
    UOM
    <div style="font-size: 10px;">Your can add uom here</div></a>
    </div>
 
    <div class="acolumn"></div>
    <div class="column" style="background:#f44171;"> <a href="user.php"style="color: white;">
    Users
    <div style="font-size: 10px;">Your can add users from here</div></a>
    </div>
    </div>  
 

<?php include('footer.php');?>
<br>
<!---container end div---> 
</div>