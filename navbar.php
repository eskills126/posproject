<style type="text/css" media="screen">
   .navbar a:hover, .dropdown:hover .dropbtn {
    background-color: #bfc5cc;
}
</style>
<!----------IF Not Admin then Can't Access the User.php Page----------->
<?php
session_start();
if(!isset($_SESSION['user_session'])){
header("Location: index.php"); 
}
include_once 'header.php';
include_once("db_connect.php");
$sql = "SELECT uid, user, pass, email FROM users WHERE uid='".$_SESSION['user_session']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$row = mysqli_fetch_assoc($resultset); 
$_SESSION['user_role'];
$rights = $_SESSION['user_role'];
?>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#admin").click(function(){

           if($("#rights").val() != 1){
              //   return true;
               // }  else{
            alert("You Are Not Admin");
            return false;
    }
    });
});
</script>
<!------------------------------------------------------------------->
</head>
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

<body>
  <!-------This input is used to store and Access the Value of $_SESSION['user_role'] ----------->
  <input type="hidden" id="rights" value="<?php echo $rights; ?>" name="">
  <!----------------------------------------------------------------->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary"style="width:auto;white-space: nowrap;">

  <!-- Brand -->
  <a class="navbar-brand" href="welcome.php"><img style="display: inline-block; height: 40px;width: 40px; margin-top: -5px;border-radius: 50px;"src="images/images.png"></a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
  <ul class="navbar-nav mr-auto">
    
    <!-- Dropdown -->
    <li class="nav-item dropdown active">

      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Master
      </a>
      <!--Dropdown Item div-->
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <!-- Dropdown Items -->
        <a class="dropdown-item" href="customers.php">Customers</a>
        <a class="dropdown-item" href="suppliers.php">Suppliers</a>
        <a class="dropdown-item" href="salesitem.php">Sales Items</a>
        <a class="dropdown-item" href="assetform.php">Assets, Banks & Receivable</a>
        <a class="dropdown-item" href="Liabform.php">Liabilities & Payables</a>
        <a class="dropdown-item" href="ExpenseForm.php">Expenses Accounts</a>
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="SalesArea.php">Sales Area/Territories</a>
        <a class="dropdown-item" href="salesitemtype.php">Sales Items Type</a>
        <a class="dropdown-item" href="salesitemgroup.php">Sales Item Group</a>
        <!--dropdown divider-->
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="warehouse.php">Warehouses</a>
        <!--dropdown divider-->
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="uom.php">Unit of Measurement</a><!--dropdown divider-->
        <div class="dropdown-divider"></div>
        <a id="admin" class="dropdown-item" href="user.php">Create User</a>
      </div>
</li>
<!--button-->

        <button class="btn navbar-btn "style="background-color: red;color:white">Transactions>
    </button>
    <!--static links-->
        
    <li class="nav-item active">
      <a class="nav-link" href="purchases.php">Purchases <span aria-hidden="true"></span></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="sales.php">Sales<span aria-hidden="true"></span></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="cashpaid.php">Cash Paid<span aria-hidden="true"></span></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="cashreceived.php">Cash Received<span aria-hidden="true"></span></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="gt.php">Generals<span aria-hidden="true"></span></a>
    </li>

    <li class="nav-item dropdown active">

      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Returns
      </a>
       <!--Dropdown Item div-->
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <!-- Dropdown Items -->
        <a class="dropdown-item" href="pr.php">Purchases Return</a>
        <a class="dropdown-item" href="sr.php">Sales Return</a>
        <a class="dropdown-item" href="stt.php">Warehouse Stock Transfer</a>
    </div>
  </li>

    <button class="btn navbar-btn"style="background-color: red;color:white">Reports>
    </button>

 <li class="nav-item dropdown active">

      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Master
      </a>

       <!--Dropdown Item div-->
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <!-- Dropdown Items -->
        <a class="dropdown-item" href="js/chartofac.php">Chart of Account</a>
        <class="dropdown-item">
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="js/AssetRpt.php">Assets</a>
        <a class="dropdown-item" href="js/customerrpt.php">Customers</a>
        <a class="dropdown-item" href="js/liabrpt.php">Liabilities</a>
        <a class="dropdown-item" href="js/supplierrpt.php">Suppliers</a>
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="js/salesitemrpt.php">Sales Items</a>
        <a class="dropdown-item" href="js/expenserpt.php">Expenses</a>
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Sales Products/Items Types</a>
        <a class="dropdown-item" href="#">Sales Products/Items Groups</a>
        <a class="dropdown-item" href="#">Sales Products/Items Groups Types</a>
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">View Users </a>
        </div>
      </li>

        <li class="nav-item dropdown active">

      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Transaction
      </a>

       <!--Dropdown Item div-->
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <!-- Dropdown Items -->
        <a class="dropdown-item" href="#">Cash Book</a>
        <a class="dropdown-item" href="#">Cash Received Transaction</a>
        <a class="dropdown-item" href="#">Cash Paid Transaction</a>
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Sales Transaction</a>
        <a class="dropdown-item" href="#">Sales Return</a>
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Purchase Transaction</a>
        <a class="dropdown-item" href="#">Purchase Return</a>
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">General Transaction</a>
        </div>
      </li>

        <li class="nav-item dropdown active">

      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Financials 
      </a>
       
       <!--Dropdown Item div-->
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <!-- Dropdown Items -->
        <a class="dropdown-item" href="#">Account Transactions</a>
        <a class="dropdown-item" href="#">Account Search Position</a>
        <a class="dropdown-item" href="#">Account Position Statement</a>
        <a class="dropdown-item" href="#">Account Position Detail Statement</a>
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Sale Invoice Previous Balance</a>
        <class="dropdown-item">
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Sale Invoice</a>
        <a class="dropdown-item" href="#">Gate Pass</a>
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Trail Balance</a>
        <a class="dropdown-item" href="#">Balance Sheet</a>
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Customer Balances</a>
        <a class="dropdown-item" href="#">Area Wise Customer Balances</a>
        <a class="dropdown-item" href="#">Supplier Balances</a>
        <a class="dropdown-item" href="#">Assets Balances</a>
        <a class="dropdown-item" href="#">Liabilities Balances</a>
        <a class="dropdown-item" href="#">Revenue Balances</a>
        <a class="dropdown-item" href="#">Expense Balances</a>
</div>
</li>
        <li class="nav-item dropdown active">

      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Stock 
      </a>
      <!--Dropdown Item div-->
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       <!-- Dropdown Items -->
        <a class="dropdown-item" href="#">Account Transactions</a>
        <a class="dropdown-item" href="#">Stock Query</a>
        <a class="dropdown-item" href="#">Warehouse Stock Query</a>
        <a class="dropdown-item" href="#">Item Stock Position</a>
        <a class="dropdown-item" href="#">Stock Summary Statement
        <a class="dropdown-item" href="#">Warehouse Item Stock Position</a>
        
        <a class="dropdown-item" href="#">Warehouse Stock Summary</a>
        <!--dropdown divider-->
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Sales Analysis</a>
        
    </div>
</li>

<a href="welcome.php" class="btn btn-work"style="background-color: red;color:white">DashBoard
    </a>
      </ul> 

</nav>
</div>