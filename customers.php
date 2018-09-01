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
		<h2 class="page-header text-center"><i class="fa fa-edit"></i>Customer's Profile</h2>
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
        <label for="cname">Customer Name:</label>
      	</div>
      	<span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="text" id="cname" name="cname" placeholder="Enter Customer Name" required>
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="caddress">Address:</label>
      	</div>
      	<div class="col-75">
        <input type="text" id="caddress" name="caddress" placeholder="Enter Customer's Address">
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="ccontact">Cotact:</label>
      	</div>
      	<div class="col-75">
        <input type="text" id="ccontact" name="ccontac" placeholder="Enter Customer's Contact">
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="cclimit">Credit Limit:</label>
      	</div>
      	<div class="col-75">
        <input type="number" id="climit" name="climit" placeholder="Enter Credit Limit">
      	</div>
    	</div>
		</div>

		
		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="copbal">Opening Balance:</label>
        </div>
        <span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="number" id="copbal" name="copbal" placeholder="Enter Opening Balance"required>
        </div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="carea">Customer Area:</label>
        </div>
        <span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="text" id="carea" name="carea" placeholder="Enter Customer Area" autocomplete="on">
        </div>
    	</div>
		</div>

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
		
		}else if (id==0){
		$.ajax({
			 url:  "Masters_Customers/insert.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
				$("#output").load("Masters_Customers/view.php");
		//$("<tr ></tr>").html(d).insertAfter($("#DESC"));
		//$("<tr ></tr>").html(d).insertAfter($("#abc"));
		//$("#examples").prepend($("<tr></tr>")).html(d);
		//$("#examples").appendTo($("<tr></tr>")).html(d);
		
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

