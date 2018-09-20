<?php include('navbar.php'); ?>
<h1 style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-weight: bold;">Dash Board</h1>

  <div class='alert alert-success' id="success-alert">
		<button class='close' data-dismiss='alert'>&times;</button>
		Welcome to the
    <strong> aanSoft</strong>
    </div>		
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