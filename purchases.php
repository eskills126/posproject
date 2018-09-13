<!--Asterik Input Red-->
<style type="text/css" media="screen">
.asterisk_input:after {
content:" *"; 
color: #e32;
position: absolute; 
margin: 0px 0px 0px -20px; 
font-size: x-large; 
padding: 0 5px 0 0; 
}
</style>

<!--Code for Login Detail-->
<?php
include('header.php'); 
session_start();
if(!isset($_SESSION['user_session'])){
  header("Location: index.php");
}

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
		<h2 class="page-header text-center"><i class="fa fa-edit"></i>&nbsp Purchases Bill/Transaction</h2>
		</div>


	<div class="col-xs-6 col-sm-4">
	<div class="dropdown" align="right"id="logininfo">
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
</p>
</div>

<div class="container">
					
<form id="frm" action="" method="post">
  <!---------------------------------------------------------------->
<?php  
      $sql2 = "SELECT * FROM purchaseorderdetailtbl where PurOrderId=(SELECT max(PurOrderId) FROM purchaseorderdetailtbl) GROUP by PurOrderId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        ?>  
        
        <div class="form-group">
          <div class="row">
        <div class="col-25">
        <label for="ino">No:</label>
        </div>
          <div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="ino" name="ino" placeholder="Invoice No." value="<?php echo
         $row['PurOrderId'] + 1;  ?>"  readonly>
         <span id="error_id" class="text-danger"></span>
        </div>    
        <?php 
            }
        }
        else{
            ?>
            <div class="form-group">
          <div class="row">
        <div class="col-25">
        <label for="ino">No:</label>
        </div>
          <div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="ino" name="ino" placeholder="Invoice No." value="1" readonly>
        <span id="error_id" class="text-danger"></span>
        </div>  
            <?php 
            }
             ?> 
     
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="pdate">Date:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input id="pdate" data-inputmask="'alias': 'date'" name="pdate" value="<?php echo date('d/m/Y'); ?>" style="border:2px solid #ccc; border-radius: 4px;height: 35px;">
        <span id="error_date" class="text-danger"></span>
      	</div>
    	</div>
		</div>
<!--------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------->
		






    <div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="scode">Supplier Code:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="text" id="scode" name="scode" placeholder="Enter Supplier Code" required ">
        <span id="error_scode" class="text-danger"></span>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-60">
      	<input type="text"id="sname" name="sname" placeholder="Supplier Name"style="width: 95%;" readonly>
        <span id="error_sname" class="text-danger"></span>
        <a href="suppliers.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-25"style="width: 10%;">
      	<label for="sbal">Balance:</label>
      	</div>
      	<div class="col-25">
      	<input type="text" name="sbal" id="sbal" placeholder="Supplier Balance"style="width:80%;" readonly>
        <span id="error_sbal" class="text-danger"></span>
      	</div>
      	</div>
      	</div>
    	 <!---Item Code row----->
    	<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="icode">Item Code:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="text" id="icode" name="icode" placeholder="Enter Item Code" required">
        <span id="error_icode" class="text-danger"></span>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-60">
      	<input type="text"id="iname" name="iname" placeholder="Item Name"style="width: 95%;" readonly>
        <span id="error_iname" class="text-danger"></span>
        <a href="salesitem.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
      	</div>
      	</div>
      	</div>
		 <!---Warehouse row----->
		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="wcode">Warehouse Code:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="text" id="wcode" name="wcode" placeholder="Enter Warhouse Code" required">
        <span id="error_wcode" class="text-danger"></span>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-60">
      	<input type="text"id="wname" name="wname" placeholder="Warehouse Name"style="width: 95%;" readonly>
        <span id="error_wname" class="text-danger"></span>
        <a href="warehouse.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
      	</div>
      	</div>
      	</div>
      <!---Quantity row----->
      	<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="qty">Quantity:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="qty" name="qty" placeholder="Quantity" required>
        <span id="error_qty" class="text-danger"></span>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="sqty">Stock Quantity:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="sqty" name="sqty" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;" placeholder="Stock Quantity">
        <span id="error_sqty" class="text-danger"></span>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="grate">Gross Rate:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="grate" name="grate" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;" placeholder="Gross Rate">
        <span id="error_grate" class="text-danger"></span>
      	</div>
    	</div>
		</div>

		<!---Gross Amount row----->
      	<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="gamount">Gross Amount:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="gamount" name="gamount" placeholder="Gross Amount" required>
        <span id="error_gamount" class="text-danger"></span>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="DisRate">Discount % Rate:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="disrate" name="disRate" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;" placeholder="Discount % Rate">
        <span id="error_disrate" class="text-danger"></span>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="Dvalue">DiscountValue Rate:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="dvalue" name="dvalue" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;" placeholder="Discount Value Rate">
        <span id="error_dvalue" class="text-danger"></span>
      	</div>
    	</div>
		</div>

		<!---Discounted Rate----->
		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="disdrate">Discounted Rate:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="disdrate" name="disdrate" placeholder="Discounted Rate" required>
        <span id="error_disdrate" class="text-danger"></span>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="Rate">Rate:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="rate" name="rate" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;" placeholder="Rate">
        <span id="error_rate" class="text-danger"></span>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="amount">Amount:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="amount" name="amount" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;" placeholder="Amount">
        <span id="error_amount" class="text-danger"></span>
      	</div>
    	</div>
		</div>

		<!---Display ID row----->
		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="did">Display ID:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="text" id="did" name="did" placeholder="Enter Display Id" required">
        <span id="error_did" class="text-danger"></span>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-25"><label for="remarks">Remarks</label></div>
      	<div class="col-75">
      	<input type="text"id="remarks" name="remarks" placeholder="Remarks..." style="width: 91%;">
        <span id="error_remarks" class="text-danger"></span>
      	</div>
      	</div>
      	</div>

		<!----button row------>
		<div class="form-group">
    	<div class="row">
    	<div class="col-25">
    	</div>
    	<div class="col-75">
    	<button type="button" name="save" id="save" class="btn btn-success">Save</button>
      <input type="text" name="row_id" id="hidden_row_id" />
    	<input type="hidden" id="id" name="id" value="0">
    	
    	</div>
    	</div>
    	</div>

    	<div class="form-group">
    	<input type="hidden" id="temp" name="temp" autocomplete="on" style="width: 5%;">
        </div>

</form>

<!--------------------To Show Temporary Record------------------------->

  <form method="post" id="user_form">
       
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="user_data">
            
            <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Supplier Code</th>
        <th>Supplier Name</th>
        <th>Balance</th>
        <th>Item Code</th>
        <th>Item Name</th>
        <th>Warehouse Code</th>
        <th>Warehouse Name</th>
        <th>Quantity</th>
        <th>Stock Quantity</th>
        <th>Gross Rate</th>
        <th>Gross Amount</th>
        <th>Discount %</th>
        <th>Discount Value</th>
        <th>Discount Rate</th>
        <th>Rate</th>
        <th>Amount</th>
        <th>Display ID</th>
        <th>Remarks</th>
        <th>Edit</th>
        <th>Delete</th>
            </tr>
          </table>
        </div>
        
       </form>
   
</div>
<!--------------------------------------------------------------->    
<div class="container">
<form id="frm" action="" method="post">

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="tqty">Total Quantity:</label>
      	</div>
      	<div class="col-25">
      	<input type="text" id="tqty" name="tqty" placeholder="Total Quanity">
      	</div>
      	<div class="col-25" style="width:2%;"></div>
      	<div class="col-25" style="width: 10%;">
        <label for="bamt">Bill Amount:</label>
      	</div>
      	<div class="col-25">
      	<input type="text" id="bamt" name="bamt" placeholder="Bill Amount">
      	</div>
      	<div class="col-25" style="width:2%;"></div>
      	<div class="col-25" style="width: 12%;">
        <label for="gamt">Gross Amount:</label>
      	</div>
      	<div class="col-25">
      	<input type="text" id="gamt" name="gamt" placeholder="Gross Amount">
      	</div>
      	<div class="col-25" style="width:1%;"></div>
      	<div class="col-25" style="width: 12%;">
      	<input type="text" id="gamt" name="gamt" placeholder="Discount" style="width: 60%;">
      	</div>
      	</div>
      	</div>

		<!----button row------>
		<div class="form-group">
    	<div class="row">
    	<div class="col-25"></div>
    	<div class="col-25">
    	<input type="button" id="insert" name="insert" class="btn btn-success" value="Save Record" >
    	<input type="hidden" id="id" name="id" value="0">
    	<div id="msg"></div>
    	</div>
    	</div>
    	</div>
 </form>
</div>


<div class="row">
<div class="col-xs-6 col-sm-1"></div>
<div class="col-xs-6 col-sm-10 col-md-offset-4" id="output">
</div>
</div>


<!------This code is for Enter Index insted of TabIndex OK--------->
<script type="text/javascript">
	$(document).ready(function(){

inputs = $("form :input");
$(inputs).keypress(function(e){
	  if (e.keyCode == 13){
		  inputs[inputs.index(this)+1].focus();
	  }
});

});
</script>


<!----------------------------------------------------------->
<script>
  $(document).ready(function(){
$("#output").load("Transaction_purchases/view.php");
$("#scode").focus();

var count = 0;



$('#save').click(function(){
    var error_id = '';
    var error_date = '';
    var error_scode = '';
    var error_sname = '';
    var error_sbal = '';
    var error_icode = '';
    var error_iname = '';
    var error_wcode = '';
    var error_wname = '';
    var error_qty = '';
    var error_sqty = '';
    var error_grate = '';
    var error_gamount = '';
    var error_disrate = '';
    var error_dvalue = '';
    var error_disdrate = '';
    var error_rate = '';
    var error_amount = '';
    var error_did = '';
    var error_remarks = '';
    
//-------------------------------------------------------------------
    var ino = '';
    var pdate = '';
    var scode = '';
    var sname = '';
    var sbal = '';
    var icode = '';
    var iname = '';
    var wcode = '';
    var wname = '';
    var qty = '';
    var sqty = '';
    var grate = '';
    var gamount = '';
    var disrate = '';
    var dvalue = '';
    var disdrate = '';
    var rate = '';
    var amount = '';
    var did = '';
    var remarks = '';
        
    if($('#ino').val() == '')
    {
      error_id = 'ID is required';
      $('#error_id').text(error_id);
      $('#ino').css('border-color', '#cc0000');
      ino = '';
      $('#ino').focus();
    }
    else
    {
      error_id = '';
      $('#error_id').text(error_id);
      $('#ino').css('border-color', 'green');
      ino = $('#ino').val();
    } 
//------------------------------------------------------------
if($('#pdate').val() == '')
    {
      error_date = 'Date is required';
      $('#error_date').text(error_date);
      $('#pdate').css('border-color', '#cc0000');
      pdate = '';
      $('#pdate').focus();
    }
    else
    {
      error_date = '';
      $('#error_date').text(error_date);
      $('#pdate').css('border-color', 'green');
      pdate = $('#pdate').val();
    } 
//-----------------------------------------------------------
//------------------------------------------------------------
if($('#scode').val() == '')
    {
      error_scode = 'Supplier Code is required';
      $('#error_scode').text(error_scode);
      $('#scode').css('border-color', '#cc0000');
      scode = '';
      $('#scode').focus();
    }
    else
    {
      error_scode = '';
      $('#error_scode').text(error_scode);
      $('#scode').css('border-color', 'green');
      scode = $('#scode').val();
    } 
//------------------------------------------------------------
if($('#sname').val() == '')
    {
      error_sname = 'Supplier Name is required';
      $('#error_sname').text(error_sname);
      $('#sname').css('border-color', '#cc0000');
      sname = '';
      $('#sname').focus();
    }
    else
    {
      error_sname = '';
      $('#error_sname').text(error_sname);
      $('#sname').css('border-color', 'green');
      sname = $('#sname').val();
    } 
//------------------------------------------------------------
if($('#sbal').val() == '')
    {
      error_sbal = 'Supplier Balance is required';
      $('#error_sbal').text(error_sbal);
      $('#sbal').css('border-color', '#cc0000');
      sbal = '';
      $('#sbal').focus();
    }
    else
    {
      error_sbal = '';
      $('#error_sbal').text(error_sbal);
      $('#sbal').css('border-color', 'green');
      sbal = $('#sbal').val();
    } 
//------------------------------------------------------------
if($('#icode').val() == '')
    {
      error_icode = 'Supplier Item Code is required';
      $('#error_icode').text(error_icode);
      $('#icode').css('border-color', '#cc0000');
      icode = '';
      $('#icode').focus();
    }
    else
    {
      error_icode = '';
      $('#error_icode').text(error_icode);
      $('#icode').css('border-color', 'green');
      icode = $('#icode').val();
  }
//------------------------------------------------------------
if($('#iname').val() == '')
    {
      error_iname = 'Supplier Item Name is required';
      $('#error_iname').text(error_iname);
      $('#iname').css('border-color', '#cc0000');
      iname = '';
      $('#iname').focus();
    }
    else
    {
      error_iname = '';
      $('#error_iname').text(error_iname);
      $('#iname').css('border-color', 'green');
      iname = $('#iname').val();
    } 
//------------------------------------------------------------
if($('#wcode').val() == '')
    {
      error_wcode = 'Warehouse Code is required';
      $('#error_wcode').text(error_wcode);
      $('#wcode').css('border-color', '#cc0000');
      wcode = '';
      $('#wcode').focus();
    }
    else
    {
      error_wcode = '';
      $('#error_wcode').text(error_wcode);
      $('#wcode').css('border-color', 'green');
      wcode = $('#wcode').val();
    } 
//------------------------------------------------------------
if($('#wname').val() == '')
    {
      error_wname = 'Warehouse Name is required';
      $('#error_wname').text(error_wname);
      $('#wname').css('border-color', '#cc0000');
      wname = '';
      $('#wname').focus();
    }
    else
    {
      error_wname = '';
      $('#error_wname').text(error_wname);
      $('#wname').css('border-color', 'green');
      wname = $('#wname').val();
  }
//------------------------------------------------------------
if($('#qty').val() == '')
    {
      error_qty = 'Supplier Quantity is required';
      $('#error_qty').text(error_qty);
      $('#qty').css('border-color', '#cc0000');
      qty = '';
      $('#qty').focus();
    }
    else
    {
      error_qty = '';
      $('#error_qty').text(error_qty);
      $('#qty').css('border-color', 'green');
      qty = $('#qty').val();
    } 
//------------------------------------------------------------
if($('#sqty').val() == '')
    {
      error_sqty = 'Stock Quantity is required';
      $('#error_sqty').text(error_sqty);
      $('#sqty').css('border-color', '#cc0000');
      sqty = '';
      $('#sqty').focus();
    }
    else
    {
      error_sqty = '';
      $('#error_sqty').text(error_sqty);
      $('#sqty').css('border-color', 'green');
      sqty = $('#sqty').val();
    } 
//------------------------------------------------------------
if($('#grate').val() == '')
    {
      error_grate = 'Gross Rate is required';
      $('#error_grate').text(error_grate);
      $('#grate').css('border-color', '#cc0000');
      grate = '';
      $('#grate').focus();
    }
    else
    {
      error_grate = '';
      $('#error_grate').text(error_grate);
      $('#grate').css('border-color', 'green');
      grate = $('#grate').val();
    } 
//------------------------------------------------------------
if($('#gamount').val() == '')
    {
      error_gamount = 'Gross Amount is required';
      $('#error_gamount').text(error_gamount);
      $('#gamount').css('border-color', '#cc0000');
      gamount = '';
      $('#gamount').focus();
    }
    else
    {
      error_gamount = '';
      $('#error_gamount').text(error_gamount);
      $('#gamount').css('border-color', 'green');
      gamount = $('#gamount').val();
    } 
//------------------------------------------------------------
if($('#disrate').val() == '')
    {
      error_disrate = 'Discount % is required';
      $('#error_disrate').text(error_disrate);
      $('#disrate').css('border-color', '#cc0000');
      disrate = '';
      $('#disrate').focus();
    }
    else
    {
      error_disrate = '';
      $('#error_disrate').text(error_disrate);
      $('#disrate').css('border-color', 'green');
      disrate = $('#disrate').val();
    } 
//------------------------------------------------------------
if($('#dvalue').val() == '')
    {
      error_dvalue = 'Discount Value is required';
      $('#error_dvalue').text(error_dvalue);
      $('#dvalue').css('border-color', '#cc0000');
      dvalue = '';
      $('#dvalue').focus();
    }
    else
    {
      error_dvalue = '';
      $('#error_dvalue').text(error_dvalue);
      $('#dvalue').css('border-color', 'green');
      dvalue = $('#dvalue').val();
    } 
//------------------------------------------------------------
if($('#disdrate').val() == '')
    {
      error_disdrate = 'Discounted Value is required';
      $('#error_disdrate').text(error_disdrate);
      $('#disdrate').css('border-color', '#cc0000');
      disdrate = '';
      $('#disdrate').focus();
    }
    else
    {
      error_disdrate = '';
      $('#error_disdrate').text(error_disdrate);
      $('#disdrate').css('border-color', 'green');
      disdrate = $('#disdrate').val();
    }
//------------------------------------------------------------
if($('#rate').val() == '')
    {
      error_rate = 'Rate is required';
      $('#error_rate').text(error_rate);
      $('#rate').css('border-color', '#cc0000');
      rate = '';
      $('#rate').focus();
    }
    else
    {
      error_rate = '';
      $('#error_rate').text(error_rate);
      $('#rate').css('border-color', 'green');
      rate = $('#rate').val();
    }
//------------------------------------------------------------
if($('#amount').val() == '')
    {
      error_amount = 'Amount is required';
      $('#error_amount').text(error_amount);
      $('#amount').css('border-color', '#cc0000');
      amount = '';
      $('#amount').focus();
    }
    else
    {
      error_amount = '';
      $('#error_amount').text(error_amount);
      $('#amount').css('border-color', 'green');
      amount = $('#amount').val();
    }
//------------------------------------------------------------
if($('#did').val() == '')
    {
      error_did = 'Display Id is required';
      $('#error_did').text(error_did);
      $('#did').css('border-color', '#cc0000');
      did = '';
      $('#did').focus();
    }
    else
    {
      error_did = '';
      $('#error_did').text(error_did);
      $('#did').css('border-color', 'green');
      did = $('#did').val();
    }
//------------------------------------------------------------
if($('#remarks').val() == '')
    {
      error_remarks = 'Remarks is required';
      $('#error_remarks').text(error_remarks);
      $('#remarks').css('border-color', '#cc0000');
      remarks = '';
      $('#remarks').focus();
    }
    else
    {
      error_remarks = '';
      $('#error_remarks').text(error_remarks);
      $('#remarks').css('border-color', 'green');
      remarks = $('#remarks').val();
    }
//-----------------------------------------------------------------------------

if(error_id != '' || error_date != '' || error_scode !='' || error_sname !='' || error_sbal !='' || error_icode !='' || error_iname !='' || error_wcode !='' || error_wname !='' || error_qty !='' || error_sqty !='' || error_grate !='' || error_gamount !='' || error_disrate !='' || error_dvalue !='' || error_disdrate !='' || error_rate !='' || error_amount !='' || error_did !='' || error_remarks !='' )
    {
      return false;
    }
    else
    {
      if($('#save').text() == 'Save')
      {
        count = count + 1;
        output = '<tr id="row_'+count+'">';
output += '<td>'+ino+' <input type="text" name="ino[]" id="ino'+count+'"  value="'+ino+'" /></td>';
output += '<td>'+pdate+' <input type="text" name="pdate[]" id="pdate'+count+'" value="'+pdate+'" /></td>';
output += '<td>'+scode+' <input type="text" name="scode[]" id="scode'+count+'" value="'+scode+'" /></td>';
output += '<td>'+sname+' <input type="text" name="sname[]" id="sname'+count+'" value="'+sname+'" /></td>';
output += '<td>'+sbal+' <input type="text" name="sbal[]" id="sbal'+count+'" value="'+sbal+'" /></td>';
output += '<td>'+icode+' <input type="text" name="icode[]" id="icode'+count+'" value="'+icode+'" /></td>';
output += '<td>'+iname+' <input type="text" name="iname[]" id="iname'+count+'" value="'+iname+'" /></td>';
output += '<td>'+wcode+' <input type="text" name="wcode[]" id="wcode'+count+'" value="'+wcode+'" /></td>';
output += '<td>'+wname+' <input type="text" name="wname[]" id="wname'+count+'" value="'+wname+'" /></td>';
output += '<td>'+qty+' <input type="text" name="qty[]" id="qty'+count+'" value="'+qty+'" /></td>';
output += '<td>'+sqty+' <input type="text" name="sqty[]" id="sqty'+count+'" value="'+sqty+'" /></td>';
output += '<td>'+grate+' <input type="text" name="grate[]" id="grate'+count+'" value="'+grate+'" /></td>';
output += '<td>'+gamount+' <input type="text" name="gamount[]" id="gamount'+count+'" value="'+gamount+'" /></td>';
output += '<td>'+disrate+' <input type="text" name="disrate[]" id="disrate'+count+'" value="'+disrate+'" /></td>';
output += '<td>'+dvalue+' <input type="text" name="dvalue[]" id="dvalue'+count+'" value="'+dvalue+'" /></td>';
output += '<td>'+disdrate+' <input type="text" name="disdrate[]" id="disdrate'+count+'" value="'+disdrate+'" /></td>';
output += '<td>'+rate+' <input type="text" name="rate[]" id="rate'+count+'" value="'+rate+'" /></td>';
output += '<td>'+amount+' <input type="text" name="amount[]" id="amount'+count+'" value="'+amount+'" /></td>';
output += '<td>'+did+' <input type="text" name="did[]" id="did'+count+'" value="'+did+'" /></td>';
output += '<td>'+remarks+' <input type="text" name="remarks[]" id="remarks'+count+'" value="'+remarks+'" /></td>';

//----------------Buttons----Edit------Delete-----------------------------
output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">Edit</button></td>';

output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Delete</button></td>';
//------------------------------------------------------------------------
output += '</tr>';
        $('#user_data').append(output);
        $("#frm")[0].reset();
        $("#scode").focus();
      }

      else
      {
        var row_id = $('#hidden_row_id').val();
   
output += '<td>'+ino+' <input type="hidden" name="ino[]" id="ino'+row_id+'" class="ino" value="'+ino+'" /></td>';
output += '<td>'+pdate+' <input type="hidden" name="pdate[]" id="pdate'+row_id+'" value="'+pdate+'" /></td>';
output += '<td>'+scode+' <input type="hidden" name="scode[]" id="scode'+row_id+'" value="'+scode+'" /></td>';
output += '<td>'+sname+' <input type="hidden" name="sname[]" id="sname'+row_id+'" value="'+sname+'" /></td>';
output += '<td>'+sbal+' <input type="hidden" name="sbal[]" id="sbal'+row_id+'" value="'+sbal+'" /></td>';
output += '<td>'+icode+' <input type="hidden" name="icode[]" id="icode'+row_id+'" value="'+icode+'" /></td>';
output += '<td>'+iname+' <input type="hidden" name="iname[]" id="iname'+row_id+'" value="'+iname+'" /></td>';
output += '<td>'+wcode+' <input type="hidden" name="wcode[]" id="wcode'+row_id+'" value="'+wcode+'" /></td>';
output += '<td>'+wname+' <input type="hidden" name="wname[]" id="wname'+row_id+'" value="'+wname+'" /></td>';
output += '<td>'+qty+' <input type="hidden" name="qty[]" id="qty'+row_id+'" value="'+qty+'" /></td>';
output += '<td>'+sqty+' <input type="hidden" name="sqty[]" id="sqty'+row_id+'" value="'+sqty+'" /></td>';
output += '<td>'+grate+' <input type="hidden" name="grate[]" id="grate'+row_id+'" value="'+grate+'" /></td>';
output += '<td>'+gamount+' <input type="hidden" name="gamount[]" id="gamount'+row_id+'" value="'+gamount+'" /></td>';
output += '<td>'+disrate+' <input type="hidden" name="disrate[]" id="disrate'+row_id+'" value="'+disrate+'" /></td>';
output += '<td>'+dvalue+' <input type="hidden" name="dvalue[]" id="dvalue'+row_id+'" value="'+dvalue+'" /></td>';
output += '<td>'+disdrate+' <input type="hidden" name="disdrate[]" id="disdrate'+row_id+'" value="'+disdrate+'" /></td>';
output += '<td>'+rate+' <input type="hidden" name="rate[]" id="rate'+row_id+'" value="'+rate+'" /></td>';
output += '<td>'+amount+' <input type="hidden" name="amount[]" id="amount'+row_id+'" value="'+amount+'" /></td>';
output += '<td>'+did+' <input type="hidden" name="did[]" id="did'+row_id+'" value="'+did+'" /></td>';
output += '<td>'+remarks+' <input type="hidden" name="remarks[]" id="remarks'+row_id+'" value="'+remarks+'" /></td>';
//----------------Buttons----Edit------Delete-----------------------------
output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">Edit</button></td>';
output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Delete</button></td>';       

        $('#row_'+row_id+'').html(output);
      }
   }
  });



  $(document).on('click', '.view_details', function(){
    var row_id = $(this).attr("id");
    var ino = $('#ino'+row_id+'').val();
    var pdate = $('#pdate'+row_id+'').val();
    var scode = $('#scode'+row_id+'').val();
    var sname = $('#sname'+row_id+'').val();
    var sbal = $('#sbal'+row_id+'').val();
    var icode = $('#icode'+row_id+'').val();
    var iname = $('#iname'+row_id+'').val();
    var wcode = $('#wcode'+row_id+'').val();
    var wname = $('#wname'+row_id+'').val();
    var qty = $('#qty'+row_id+'').val();
    var sqty = $('#sqty'+row_id+'').val();
    var grate = $('#grate'+row_id+'').val();
    var gamount = $('#gamount'+row_id+'').val();
    var disrate = $('#disrate'+row_id+'').val();
    var dvalue = $('#dvalue'+row_id+'').val();
    var disdrate = $('#disdrate'+row_id+'').val();
    var rate = $('#rate'+row_id+'').val();
    var amount = $('#amount'+row_id+'').val();
    var did = $('#did'+row_id+'').val();
    var remarks = $('#remarks'+row_id+'').val();
    
    $('#ino').val(ino);
    $('#pdate').val(pdate);
    $('#scode').val(scode);
    $('#sname').val(sname);
    $('#sbal').val(sbal);
    $('#icode').val(icode);
    $('#iname').val(iname);
    $('#wcode').val(wcode);
    $('#wname').val(wname);
    $('#qty').val(qty);
    $('#sqty').val(sqty);
    $('#grate').val(grate);
    $('#gamount').val(gamount);
    $('#disrate').val(disrate);
    $('#rate').val(rate);
    $('#amount').val(amount);
    $('#did').val(did);
    $('#remarks').val(remarks);


    $('#save').text('Edit');
    $('#hidden_row_id').val(row_id);
 });

$(document).on('click', '#save', function(){
    
    if ($("#ino").val()!="" && $("#pdate").val()!="" && $("#scode").val()!="" && $("#sname").val()!="" && $("#sbal").val()!="" && $("#icode").val()!="" && $("#iname").val()!="" && $("#wcode").val()!="" && $("#wname").val()!="" && $("#qty").val()!="" && $("#sqty").val()!="" && $("#grate").val()!="" && $("#gamount").val()!="" && $("#disrate").val()!="" && $("#rate").val()!="" && $("#amount").val()!="" && $("#did").val()!="" && $("#remarks").val()!="")


     {
    $("#frm")[0].reset();
    $("#scode").focus();
      
    }
    
  });


  $(document).on('click', '.remove_details', function(){
    var row_id = $(this).attr("id");
    if(confirm("Are you sure you want to remove this row data?"))
    {
      $('#row_'+row_id+'').remove();
    }
    else
    {
      return false;
    }
  });






































































 });
  
</script>































































































<!----------------------------------------------
<script>
$(document).ready(function(){
	$("#output").load("Transaction_purchases/view.php");
	$("#scode").focus();
	$("#save").click(function() {
		var id=$("#id").val();
		//if ($("#cname").val()=="" || $("#copbal").val()=="" || $("#carea").val()=="" )
		if ($("#cname").val()=="" ){
			
			alert("Please Add Customer Name ");
			
			$("#cname").focus();

		}else if($("#copbal").val()=="" ){
			alert("Please Add Opening Balance ");
			$("#copbal").focus();
		
		}else if($("#carea").val()=="" ){
			alert("Please Add Customer Area ");
			$("#carea").focus();
		
		}else if($("#temp").val()== 0 ){
			alert("Please Select Customer Area Value From Dropdown List: ");
			$("#carea").focus();
		
		}else if (id==0){
		$.ajax({
			 url:  "Masters_Customers/insert.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
				$("#output").load("Masters_Customers/view.php");
		//$("<tr ></tr>").html(d).insertAfter($("#DESC"));
		//$("#examples").html(d).appendTo("<tr></tr>");

		$("#frm")[0].reset();
		$("#cname").focus();
		//$("#cname").val('');
		
		$("#id").val("0");
			}

		});
	}else{
			$.ajax({
			url:  "Masters_Customers/update.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
			
		$("#output").load("Masters_Customers/view.php");
		$("#frm")[0].reset();
		$("#cname").focus();
		$("#id").val("0");
			}
		});
		}
	});
	$(document).on("click",".del",function(){
		var del=$(this);
		var id = $(this).attr("data-id");
		$.ajax({
			url:  "Masters_Customers/delete.php",
			type:  "post",
			data: {id:id},
			success:function() {
				del.closest("tr").hide();

			}
		});
	});
// Update Query
$(document).on("click",".edit",function(){
		var row=$(this);
		var id = $(this).attr("data-id");
		$("#id").val(id);

		var name = row.closest("tr").find("td:eq(1)").text();
			$("#cname").val(name);
		var address = row.closest("tr").find("td:eq(2)").text();
		$("#caddress").val(address);
		var contact = row.closest("tr").find("td:eq(3)").text();
		$("#ccontact").val(contact);
		var limit = row.closest("tr").find("td:eq(4)").text();
		$("#climit").val(limit);
		var opbal = row.closest("tr").find("td:eq(5)").text();
		$("#copbal").val(opbal);
		var area = row.closest("tr").find("td:eq(6)").text();
		$("#carea").val(area);
	});

});	
</script>
     --------------------------------------->
<!---------Code for AutoComplete Suplier Name---------->
<script>
	 $(function() {
    
     $("#scode").autocomplete({
        source: "Transaction_purchases/autocomplete_supplier.php",
        minLength: 0,
        select: function (event, ui){}
    });                

});
</script>
<!-----------Update Value in Balance OK ----------->
<script type="text/javascript">
  $(document).ready(function(){
    $("#scode").on('keyup',function(){
      var suppliercode = $(this).val();
      
        $.ajax({
          type: 'POST',
          url: 'Transaction_purchases/Baldynamic.php',
          data:{scode:suppliercode},
          success:function(data){
              $("#sbal").val(data);
          }
        });
      });
    });
</script>
<!---------------------------------------------------->
<!-----------Update Value in Supplier Name OK ----------->
<script type="text/javascript">
  $(document).ready(function(){
    $("#scode").on('keyup',function(){
      var suppliercode = $(this).val();
      
        $.ajax({
          type: 'POST',
          url: 'Transaction_purchases/supdynamic.php',
          data:{scode:suppliercode},
          success:function(data){
              $("#sname").val(data);
          }
        });
      });
    });
</script>
<!---------------------------------------------------->
<!----------Code for AutoComplete Item Name-------->
<script>
   $(function() {
    
     $("#icode").autocomplete({
        source: "Transaction_purchases/autocomplete_item.php",
        minLength: 0,
        select: function (event, ui){}
    });                

});
</script>
<!-----------Update Value in Item Name OK ----------->
<script type="text/javascript">
  $(document).ready(function(){
    $("#icode").on('keyup',function(){
      var suppliercode = $(this).val();
      
        $.ajax({
          type: 'POST',
          url: 'Transaction_purchases/itemdynamic.php',
          data:{icode:suppliercode},
          success:function(data){
              $("#iname").val(data);
          }
        });
      });
    });
</script>
<!---------------------------------------------------->
<!----------Code for AutoComplete Warehouse Name-------->
<script>
   $(function() {
    
     $("#wcode").autocomplete({
        source: "Transaction_purchases/autocomplete_warehouse.php",
        minLength: 0,
        select: function (event, ui){}
    });                

});
</script>
<!-----------Update Value in Warehouse Name OK ----------->
<script type="text/javascript">
  $(document).ready(function(){
    $("#wcode").on('keyup',function(){
      var suppliercode = $(this).val();
      
        $.ajax({
          type: 'POST',
          url: 'Transaction_purchases/whdynamic.php',
          data:{wcode:suppliercode},
          success:function(data){
              $("#wname").val(data);
          }
        });
      });
    });
</script>
<!---------------------------------------------------->



<!---------Code for Date(Formate) Masking---------->
<script>
  $("#pdate").inputmask();
</script>
<!------------------------------------------------->


<?php include('footer.php'); ?>
<p>
<br>
</p>