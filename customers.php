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
include('navbar.php');
?>

<div class="container">					
<form id="frm" action="" method="post">
		<div class="form-group">
    	<div class="row">
      	<div class="col-25"></div>
        <div class="col-75">
        <h1 style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-edit"></i> Customer's Profile</h1>
      	</div>
      </div>
      </div>
  <!-------------------------Form elements------------------------------------>    
		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="customer_id">ID:</label>
      	</div>
      	<div class="col-75">
        <input type="text" id="cid" name="cid" class="form-control" value="" readonly="" required>
      	</div>
    	</div>
		</div>


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
        <label for="ccontact">Contact:</label>
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
        <input type="text" id="carea" name="carea" placeholder="Enter Customer Area" autocomplete="on" style="width: 97%;">
        <a href="salesarea.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
    	<div class="col-25">
    	</div>
    	<div class="col-75">

    	<button type="button" class="btn btn-success" id="save" placeholder='save' value="Save Detail"><i class="fa fa-database fa-lg" aria-hidden="true"></i>&nbsp Save Detail</button>
    
    </div>

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
				
		$("#frm")[0].reset();
		$("#cname").focus();
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

		var cid = row.closest("tr").find("td:eq(0)").text();
			$("#cid").val(cid);
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
		$("#temp").val(area); // match values validating during editing

		$("#cname").focus();
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
<!--------------------This line of code is for max id ----------------------->

<script>
	$(document).on('keypress',function(){
		if($("#id").val() == 0 ){
			$.ajax({
			 url:  "Masters_Customers/maxid.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
			$("#cid").val(d);
	}
		});

	}
	});
</script>
<?php include('footer.php'); ?>