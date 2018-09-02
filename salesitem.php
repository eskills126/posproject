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
		<h2 class="page-header text-center"><i class="fa fa-edit"></i>Sales Products/Items</h2>
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
        <label for="pname">Product Name:</label>
      	</div>
      	<span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="text" id="pname" name="pname" placeholder="Enter Product Name" required>
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="uom">UOM Name:</label>
      	</div>
      	<span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="text" id="uom" name="uom" placeholder="Enter Unit of Measurement" autocomplete="on" style="width: 97%;">
        <a href="uom.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="oqu">Opening Quantity Units:</label>
      	</div>
      	<span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="text" id="oqu" name="oqu" placeholder="Enter Opening Quantity in Units">
      	</div>
    	</div>
		</div>
		
		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="orat">Opening Rates:</label>
        </div>
        <span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="number" id="orat" name="orat" placeholder="Enter Opening Rates"required>
        </div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="ob">Opening Balance:</label>
        </div>
        <span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="number" id="ob" name="ob" placeholder="Enter Opening Balance"required>
        </div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="sr">Sale Rate:</label>
        </div>
        <span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="number" id="sr" name="sr" placeholder="Enter Sales Rate"required>
        </div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="itn">Item Group Name:</label>
        </div>
        <span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="text" id="itn" name="itn" placeholder="Enter Sales Item Group" autocomplete="on" style="width: 97%;">
        <a href="salesitemgroup.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
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

    	<div class="form-group">
    	<input type="hidden" id="tempuom" name="tempuom" autocomplete="on" style="width: 5%;">
    	</div>
        <div class="form-group">
    	<input type="hidden" id="tempitem" name="tempitem" autocomplete="on" style="width: 5%;"> 
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
}); });
</script>
<!-----------Temp Compare Value For Authentication----------->
<script type="text/javascript">
	$(document).ready(function(){
		$("#uom").on('keyup',function(){
			var updatedname = $(this).val();
			
				$.ajax({
					type: 'POST',
					url: 'Masters_SalesItem/Tempdynamicupdate_uom.php',
					data:{uom:updatedname},
					success:function(data){
							$("#tempuom").val(data);
					}
				});
			});
		});
</script>
<!---------------------------------------------------->
<!-----------Temp Compare Value For Authentication----------->
<script type="text/javascript">
	$(document).ready(function(){
		$("#itn").on('keyup',function(){
			var updatedname = $(this).val();
			
				$.ajax({
					type: 'POST',
					url: 'Masters_SalesItem/Tempdynamicupdate_itn.php',
					data:{itn:updatedname},
					success:function(data){
							$("#tempitem").val(data);
					}
				});
			});
		});
</script>
<!---------------------------------------------------->
<script>
$(document).ready(function(){
	$("#output").load("Masters_SalesItem/view.php");
	$("#pname").focus();
	$("#save").click(function() {
		var id=$("#id").val();
		//if ($("#cname").val()=="" || $("#copbal").val()=="" || $("#carea").val()=="" )
		if ($("#pname").val()=="" ){
			alert("Please Add Product Name ");
			$("#pname").focus();

		}else if($("#tempuom").val()== 0 ){
			alert("Please Select UOM Name Value From Dropdown List: ");
			$("#uom").focus();
		
		}else if($("#oqu").val()=="" ){
			alert("Please Add Quantity ");
			$("#oqu").focus();
		
		}else if($("#orat").val()=="" ){
			alert("Please Add Opening Rate ");
			$("#orat").focus();
		
		}else if($("#ob").val()=="" ){
			alert("Please Add Opening Balance ");
			$("#ob").focus();
		
		}else if($("#sr").val()=="" ){
			alert("Please Add Opening Balance ");
			$("#sr").focus();
		
		}else if($("#tempitem").val()== 0 ){
			alert("Please Select Item Group Name Value From Dropdown List: ");
			$("#itn").focus();
		
		}else if (id==0){
		$.ajax({
			 url:  "Masters_SalesItem/insert.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
				$("#output").load("Masters_SalesItem/view.php");
		//$("<tr ></tr>").html(d).insertAfter($("#DESC"));
		//$("#examples").html(d).appendTo("<tr></tr>");

		$("#frm")[0].reset();
		$("#pname").focus();
		//$("#cname").val('');
		
		$("#id").val("0");
			}

		});
	}else{
			$.ajax({
			url:  "Masters_SalesItem/update.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
			
		$("#output").load("Masters_SalesItem/view.php");
		$("#frm")[0].reset();
		$("#pname").focus();
		$("#id").val("0");
			}

		});
		}
	});
	$(document).on("click",".del",function(){
		var del=$(this);
		var id = $(this).attr("data-id");
		$.ajax({
			url:  "Masters_SalesItem/delete.php",
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
			$("#pname").val(name);
		var uom = row.closest("tr").find("td:eq(2)").text();
		$("#uom").val(uom);
		var oqu = row.closest("tr").find("td:eq(3)").text();
		$("#oqu").val(oqu);
		var orat = row.closest("tr").find("td:eq(4)").text();
		$("#orat").val(orat);
		var ob = row.closest("tr").find("td:eq(5)").text();
		$("#ob").val(ob);
		var sr = row.closest("tr").find("td:eq(6)").text();
		$("#sr").val(sr);
		var itn = row.closest("tr").find("td:eq(7)").text();
		$("#itn").val(itn);
	});

});	
</script>
<!---------Code for AutoComplete UOM---------->
<script>
	 $(function() {
    
     $("#uom").autocomplete({
        source: "Masters_SalesItem/autocomplete_uom.php",
        minLength: 0,
        select: function (event, ui){}
    });                
});
</script>
<!---------Code for AutoComplete Sales Item Group Name---------->
<script>
	 $(function() {
    
     $("#itn").autocomplete({
        source: "Masters_SalesItem/autocomplete_itemgroup.php",
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
