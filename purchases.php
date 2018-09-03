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

<div class="container">
					
<form id="frm" action="" method="post">


		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="ino">No:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="ino" name="ino" placeholder="Invoice No." required>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="pdate">Date:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="date" id="pdate" name="pdate" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;">
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="scode">Supplier Code:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="text" id="scode" name="scode" placeholder="Enter Supplier Code" required">
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-60">
      	<input type="text"id="sname" name="sname" placeholder="Supplier Name"style="width: 95%;">
        <a href="suppliers.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-25"style="width: 10%;">
      	<label for="sbal">Balance:</label>
      	</div>
      	<div class="col-25">
      	<input type="text" name="sbal" id="sbal" placeholder="Supplier Balance"style="width:80%;">
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
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-60">
      	<input type="text"id="iname" name="iname" placeholder="Item Name"style="width: 95%;">
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
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-60">
      	<input type="text"id="wname" name="wname" placeholder="Warehouse Name"style="width: 95%;">
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
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="sqty">Stock Quantity:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="sqty" name="sqty" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;" placeholder="Stock Quantity">
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="grate">Gross Rate:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="grate" name="grate" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;" placeholder="Gross Rate">
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
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="DisRate">Discount % Rate:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="DisRate" name="DisRate" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;" placeholder="Discount % Rate">
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="Dvalue">DiscountValue Rate:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="Dvalue" name="Dvalue" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;" placeholder="Discount Value Rate">
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
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="Rate">Rate:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="Rate" name="Rate" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;" placeholder="Rate">
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="amount">Amount:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="number" id="amount" name="amount" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;" placeholder="Amount">
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
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-25"><label for="remarks">Remarks</label></div>
      	<div class="col-75">
      	<input type="text"id="remarks" name="remarks" placeholder="Remarks..." style="width: 91%;">
      	</div>
      	</div>
      	</div>

		<!----button row------>
		<div class="form-group">
    	<div class="row">
    	<div class="col-25">
    	</div>
    	<div class="col-75">
    	<input type="button" class="btn btn-success" id="save" value="Save Detail" >
    	<input type="hidden" id="id" name="id" value="0">
    	<div id="msg"></div>
    	</div>
    	</div>
    	</div>

    	<div class="form-group">
    	<input type="hidden" id="temp" name="temp" autocomplete="on" style="width: 5%;">
        </div>

</form>
</div>
</div>

<div class="row">
<div class="col-xs-6 col-sm-1"></div>
<div class="col-xs-6 col-sm-10 col-md-offset-4" id="output">
</div>
<div class="col-xs-6 col-sm-2"></div>
</div>
</p>
<!------This code is for Enter Index insted of TabIndex--------->
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
<!-----------Temp Compare Value For Authentication----------->
<script type="text/javascript">
	$(document).ready(function(){
		$("#carea").on('keyup',function(){
			var updatedname = $(this).val();
			
				$.ajax({
					type: 'POST',
					url: 'Masters_Customers/Tempdynamicupdate.php',
					data:{carea:updatedname},
					success:function(data){
							$("#temp").val(data);
					}
				});
			});
		});
</script>
<!---------------------------------------------------->
<script>
$(document).ready(function(){
	$("#output").load("Masters_Customers/view.php");
	$("#cname").focus();
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
<!---------Code for AutoComplete Area---------->
<script>
	 $(function() {
    
     $("#carea").autocomplete({
        source: "Masters_Customers/autocomplete_area.php",
        minLength: 0,
        select: function (event, ui){}
    });                

});
</script>



<?php include('footer.php'); ?>
<p>
	<br>
	</p>
</div>
