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
		<h2 class="page-header text-center"><i class="fa fa-edit"></i>&nbsp Cash Received Transaction</h2>
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
  <input type="hidden" id="autoid" name="">
  <!---------------------------------------------------------------->
<?php  
      $sql2 = "SELECT * FROM purchaseorderdetailtbl where PurOrderId=(SELECT max(PurOrderId) FROM purchaseorderdetailtbl) GROUP by PurOrderId";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        ?>  
        
        <div class="form-group" id="inumber">
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
            <div class="form-group" id="inumber">
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
<!-----------------------------------------------------------------first row---------------------------------->
		
    <div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="acode">Account Code:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="text" id="acode" name="acode" placeholder="Enter Account Code" required ">
        <span id="error_scode" class="text-danger"></span>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-60">
      	<input type="text"id="adetail" name="adetail" placeholder="Account Detail"style="width: 95%;background-color:#edf1f7;" readonly>
        <span id="error_sname" class="text-danger"></span>
       	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-25"style="width: 10%;">
      	<label for="abal">Cash Balance:</label>
      	</div>
      	<div class="col-25">
      	<input type="text" name="abal" id="abal" placeholder="Cash Balance"style="width:80%;background-color:#edf1f7;" readonly>
        <span id="error_sbal" class="text-danger"></span>
      	</div>
      	</div>
      	</div>

      <!---Remarks row----->
      <div class="form-group">
    	<div class="row">
        <div class="col-25">
          <label for="remarks">Remarks:</label>
        </div>
        <div class="col-75">
        <input type="text" id="remarks"name="remarks" placeholder="Enter Remarks"style="width: 107%;">
        </div>
      </div>
    </div>

        <!---Amount row----->
        <div class="form-group">
        <div class="row">
        <div class="col-25">
        <label for="amount">Amount:</label>
      	</div>
      	<div class="col-25">
        <span class="asterisk_input"></span>
        <input type="number" id="amount" name="amount" placeholder="Amount..." style="border:2px solid #ccc; border-radius: 4px;height: 35px;required>
        <span id="error_qty" class="text-danger"></span>
      </div>

      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="abal">Account Balance:</label>
      	</div>
      	<div class="col-25">
        <input type="number" id="abal" name="abal" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;background-color:#edf1f7;" placeholder="Accounts Balance"readonly>
        <span id="error_sqty" class="text-danger"></span>
      	</div>
      </div>
    </div>

      
		<!---------------------Save and Edit Button------------------------->
      <div class="form-group">
      <div class="row">
      <div class="col-25">
      </div>
     <div class="col-75">  
      <!--------------
      <input type="button" id="updatesql" value="Update-btn" name="" style="display: none;">
      <input type="text" id="id" name="id" value="0">
      ---------------->
      <!---   </div>   -->
   <!----button row------>
	 <!----	<div class="form-group">    -->
    <!----  	<div class="row">          -->
    <!--	<div class="col-75">  -->
    	<button type="button" name="save" id="save" class="btn btn-success">Save</button>
      <input type="hidden" name="row_id" id="hidden_row_id" />
      <input type="hidden" id="idn" name="idn" value="0">
     	</div>
    	</div>
    	</div>

</form>
<br>
<!--------------------To Show Temporary Record------------------------->

  <form method="post" id="user_form">
       
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="user_data">
            
            <tr>
        <th>Edit</th>
        <th>Delete</th>
        <th>ID</th>   
        <th>Date</th>
        <th>Account Code</th>
        <th>Account Title</th>
        <th>Cash Balance</th>
        <th>Amount</th>
        <th>Account Balance</th>
        <th>Remarks</th>
        
            </tr>
          </table>
        </div>
    <!------Temporary input boxex---------->
<div class="form-group">
      <div class="row">
        <div class="col-25">
        <label for="tamount">Total Amount:</label>
        </div>
        <div class="col-25">
        <input type="number" id="tamount" name="tamount" placeholder="Total Quantity..."style="background-color:#edf1f7;"readonly>
        <span id="error_gamount" class="text-danger"></span>
        </div>
        
      </div>
    </div>

    
  <!------------------------------------------------------->

        <div class="form-group">
      <div class="row">
      <div class="col-25"></div>
      <div class="col-0">
      <input type="submit" name="insert" id="insert" class="btn btn-success" value="Insert" />
      <center><p><p id="msg" style="color: red;"></p></p></center>
<!---
      <input type="text" id="id" name="id" value="0">
     --------------> 
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
<br>

<!------This code is for EnterIndex insted of TabIndex OK--------->
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


<!-----------Validation and Record Insertion--------->
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
//------------------------------------------------------------        
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
//---These fields are in Reverse Order to meet the desired Results---
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
output += '<td>'+ino+' <input type="hidden" name="ino[]" id="ino'+count+'" class="ino"  value="'+ino+'" /></td>';
output += '<td>'+pdate+' <input type="hidden" name="pdate[]" id="pdate'+count+'" value="'+pdate+'" /></td>';
output += '<td>'+scode+' <input type="hidden" name="scode[]" id="scode'+count+'" value="'+scode+'" /></td>';
output += '<td>'+sname+' <input type="hidden" name="sname[]" id="sname'+count+'" value="'+sname+'" /></td>';
output += '<td>'+sbal+' <input type="hidden" name="sbal[]" id="sbal'+count+'" value="'+sbal+'" /></td>';
output += '<td>'+icode+' <input type="hidden" name="icode[]" id="icode'+count+'" value="'+icode+'" /></td>';
output += '<td>'+iname+' <input type="hidden" name="iname[]" id="iname'+count+'" value="'+iname+'" /></td>';
output += '<td>'+wcode+' <input type="hidden" name="wcode[]" id="wcode'+count+'" value="'+wcode+'" /></td>';
output += '<td>'+wname+' <input type="hidden" name="wname[]" id="wname'+count+'" value="'+wname+'" /></td>';
output += '<td>'+qty+' <input type="hidden" name="qty[]" id="qty'+count+'" value="'+qty+'" /></td>';
output += '<td>'+sqty+' <input type="hidden" name="sqty[]" id="sqty'+count+'" value="'+sqty+'" /></td>';
output += '<td>'+grate+' <input type="hidden" name="grate[]" id="grate'+count+'" value="'+grate+'" /></td>';
output += '<td>'+gamount+' <input type="hidden" name="gamount[]" id="gamount'+count+'" value="'+gamount+'" /></td>';
output += '<td>'+disrate+' <input type="hidden" name="disrate[]" id="disrate'+count+'" value="'+disrate+'" /></td>';
output += '<td>'+dvalue+' <input type="hidden" name="dvalue[]" id="dvalue'+count+'" value="'+dvalue+'" /></td>';
output += '<td>'+disdrate+' <input type="hidden" name="disdrate[]" id="disdrate'+count+'" value="'+disdrate+'" /></td>';
output += '<td>'+rate+' <input type="hidden" name="rate[]" id="rate'+count+'" value="'+rate+'" /></td>';
output += '<td>'+amount+' <input type="hidden" name="amount[]" id="amount'+count+'" value="'+amount+'" /></td>';
output += '<td>'+did+' <input type="hidden" name="did[]" id="did'+count+'" value="'+did+'" /></td>';
output += '<td>'+remarks+' <input type="hidden" name="remarks[]" id="remarks'+count+'" value="'+remarks+'" /></td>';

//----------------Buttons----Edit------Delete-----------------------------
output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">Edit</button></td>';

output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Delete</button></td>';
//------------------------------------------------------------------------
output += '</tr>';
        $('#user_data').append(output);
        $("#frm")[0].reset();
        $("#scode").focus();
      }

      else if ($('#save').text() == 'Edit Record')
      {
        var row_id = $('#hidden_row_id').val();

output = '<td>'+ino+' <input type="hidden" name="ino[]" id="ino'+row_id+'" class="ino" value="'+ino+'" /></td>';
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
      else //if ($('#save').text() == 'EditRecord')
      {
          $.ajax({
            url:  "Transaction_purchases/update.php",
            type:  "post",
             data: $("#frm").serialize(),
              success:function(d) {
      
    $("#output").load("Transaction_purchases/view.php");
  $("#frm")[0].reset();
  $("#scode").focus();
        }
      });
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
    $('#dvalue').val(dvalue);
    $('#disdrate').val(disdrate);
    $('#rate').val(rate);
    $('#amount').val(amount);
    $('#did').val(did);
    $('#remarks').val(remarks);
//--------------------------------------------------------
    $('#save').text('Edit Record');
    $('#hidden_row_id').val(row_id);

 });
//--------------------------------------------------------
$(document).on('click', '#save', function(){
    
    if ($("#ino").val()!="" && $("#pdate").val()!="" && $("#scode").val()!="" && $("#sname").val()!="" && $("#sbal").val()!="" && $("#icode").val()!="" && $("#iname").val()!="" && $("#wcode").val()!="" && $("#wname").val()!="" && $("#qty").val()!="" && $("#sqty").val()!="" && $("#grate").val()!="" && $("#gamount").val()!="" && $("#disrate").val()!="" && $("#rate").val()!="" && $("#amount").val()!="" && $("#did").val()!="" && $("#remarks").val()!="")
   {
    $("#frm")[0].reset();
    $("#scode").focus();
    $('#save').text('Save');
      
    }
    
  });
//--------------------------------------------------------
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


//----------------------------------------------------------------------
//----------------------------------------------------------------------
$('#user_form').on('submit', function(event){

    event.preventDefault();
    var count_data = 0;
         
    $('.ino').each(function(){
      count_data = count_data + 1;
    });
    if(count_data > 0 )
    {
      var form_data = $(this).serialize();
      $.ajax({
        url:"Transaction_purchases/insert.php",
        method:"POST",
        data:form_data,
        success:function(data)
        {
          $('#user_data').find("tr:gt(0)").remove();
 //This line of code Reload the ID without refreshing............
          $("#inumber").load(" #inumber");    
          $("#output").load("Transaction_purchases/view.php");

          }
      
      });
    }else{
            $("#msg").text('* Insert Atleast One Record');      
    }
  });

//............Code To Delete the Record from database..........

$(document).on("click",".del",function(){
    var del=$(this);
    var id = $(this).attr("data-id");
    $.ajax({
      url:  "Transaction_purchases/delete.php",
      type:  "post",
      data: {id:id},
      success:function() {
        del.closest("tr").hide();

      }
    });
  });

</script>

<!---------------------------------------------------------->
  <script>
// Update Query
$(document).on("click",".edit",function(){
  	var row=$(this);
		var id = $(this).attr("data-id");
	   	$("#idn").val(id);
   // var autoid = row.closest("tr").find("td:eq(2)").text();
     // $("#autoid").val(autoid);
		var itemno = row.closest("tr").find("td:eq(2)").text();
			$("#ino").val(itemno);
		var pdate = row.closest("tr").find("td:eq(3)").text();
		$("#pdate").val(pdate);
		var scode = row.closest("tr").find("td:eq(4)").text();
		$("#scode").val(scode);
		var sname = row.closest("tr").find("td:eq(5)").text();
		$("#sname").val(sname);
		var balance = row.closest("tr").find("td:eq(6)").text();
		$("#sbal").val(balance);
		var icode = row.closest("tr").find("td:eq(7)").text();
		$("#icode").val(icode);
    var iname = row.closest("tr").find("td:eq(8)").text();
    $("#iname").val(iname);
    var wcode = row.closest("tr").find("td:eq(9)").text();
    $("#wcode").val(wcode);
    var wname = row.closest("tr").find("td:eq(10)").text();
    $("#wname").val(wname);
    var qty = row.closest("tr").find("td:eq(11)").text();
    $("#qty").val(qty);
    var sqty = row.closest("tr").find("td:eq(12)").text();
    $("#sqty").val(sqty);
    var grate = row.closest("tr").find("td:eq(13)").text();
    $("#grate").val(grate);
    var gamount = row.closest("tr").find("td:eq(14)").text();
    $("#gamount").val(gamount);
    var disrate = row.closest("tr").find("td:eq(15)").text();
    $("#disrate").val(disrate);
    var dvalue = row.closest("tr").find("td:eq(16)").text();
    $("#dvalue").val(dvalue);
    var disdrate = row.closest("tr").find("td:eq(17)").text();
    $("#disdrate").val(disdrate);
    var rate = row.closest("tr").find("td:eq(18)").text();
    $("#rate").val(rate);
    var amount = row.closest("tr").find("td:eq(19)").text();
    $("#amount").val(amount);
    var did = row.closest("tr").find("td:eq(20)").text();
    $("#did").val(did);
    var remarks = row.closest("tr").find("td:eq(21)").text();
    $("#remarks").val(remarks);
//--------------------------------------------------------------------
    $("#scode").focus();
    $("#save").text('Update');

    });
</script>

<!-----------------
//.......code to disable save Button..................
    //$("#save").attr("disabled",true);
    //$("#save").text('Insert New');
    //$("#save").css("background-color", "red");
/*
var showsave = $("#save");
showsave.hide();
var showupdate = $("#updatesql");
showupdate.show();
*/
//.......code to create an Update Button..............
/*
var $updatebtn = $('<input/>').attr({type:'button',id:'updatesql',class:'btn btn-success',name:'updatebtn',value:'Update'});
  $("#beforesave").append($updatebtn);    
*/

//.......code to Enable save Button...................
    //  $('#save').attr("disabled", false);  
    // or
    //  $('#save').removeAttr("disabled");

	--->

<!------------
<script>
$(document).on('click','#updatesql',function(){
 // $('#updatesqld').click(function(){
    $.ajax({
            url:  "Transaction_purchases/update.php",
            type:  "post",
             data: $("#frm").serialize(),
              success:function(d) {
      
    $("#output").load("Transaction_purchases/view.php");
    //$("#frm").load(" #frm");
  $("#frm")[0].reset();
  $("#scode").focus();
  var showupdate = $("#updatesql");
showupdate.hide();
    var showsave = $("#save");
showsave.show();
        }
      });

//}
 });
</script>
................-->


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