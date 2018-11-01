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
<?php include('navbar.php'); ?>

<div class="container">
					
<form id="frm" action="" method="post">

		<div class="form-group">
    	<div class="row">
      	<div class="col-25"></div>
        <div class="col-75">
        <h1 style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-edit"></i> Liabilities/Payables</h1>
      	</div>
      </div>
      </div>


      <!-------------------------------Form elements------------------------------------------->    
		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="customer_id">ID:</label>
      	</div>
      	<div class="col-75">
        <input type="text" id="lid" name="lid" class="form-control" value="" readonly="" required>
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="lname">Liability Name:</label>
      	</div>
      	<span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="text" id="lname" name="lname" placeholder="Enter Liability Name" required>
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="laddress">Address:</label>
      	</div>
      	<div class="col-75">
        <input type="text" id="laddress" name="laddress" placeholder="Enter Liability Address">
        </div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="lcontact">Contact:</label>
      	</div>
      	<div class="col-75">
        <input type="text" id="lcontact" name="lcontact" placeholder="Enter Liability Contact">
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
    	</div>
    	<div class="col-75">
    	<input type="button" class="btn btn-success" id="save" value="Save Detail">
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
	$("#output").load("Masters_Liab/view.php");
	$("#lname").focus();
	$("#save").click(function() {
		var id=$("#id").val();
		//if ($("#cname").val()=="" || $("#copbal").val()=="" || $("#carea").val()=="" )
		if ($("#lname").val()=="" ){
			alert("Please Add Liability Name ");
			$("#lname").focus();

		}else if($("#ob").val()=="" ){
			alert("Please Add Opening Balance ");
			$("#ob").focus();
		
		}else if (id==0){
		$.ajax({
			 url:  "Masters_Liab/insert.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
				$("#output").load("Masters_Liab/view.php");
		//$("<tr ></tr>").html(d).insertAfter($("#DESC"));
		//$("<tr ></tr>").html(d).insertAfter($("#abc"));
		//$("#examples").prepend($("<tr></tr>")).html(d);
		//$("#examples").appendTo($("<tr></tr>")).html(d);
		
		//$("#examples").html(d).appendTo("<tr></tr>");


		$("#frm")[0].reset();
		$("#lname").focus();
		//$("#cname").val('');
		
		$("#id").val("0");
			}

		});
	}else{
			$.ajax({
			url:  "Masters_Liab/update.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
			
		$("#output").load("Masters_Liab/view.php");
		$("#frm")[0].reset();
		$("#lname").focus();
		$("#id").val("0");
			}

		});
		}
	});
	$(document).on("click",".del",function(){
		var del=$(this);
		var id = $(this).attr("data-id");
		$.ajax({
			url:  "Masters_Liab/delete.php",
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

		var lid = row.closest("tr").find("td:eq(0)").text();
			$("#lid").val(lid);
		var name = row.closest("tr").find("td:eq(1)").text();
			$("#lname").val(name);
		var address = row.closest("tr").find("td:eq(2)").text();
		$("#laddress").val(address);
		var contact = row.closest("tr").find("td:eq(3)").text();
		$("#lcontact").val(contact);
		var opbal = row.closest("tr").find("td:eq(4)").text();
		$("#ob").val(opbal);
		$("#lname").focus();
	});

});	
</script>
<!---------Code for AutoComplete Area-----
<script>
	 $(function() {
    
     $("#carea").autocomplete({
        source: "Masters_Customers/autocomplete_area.php",
        minLength: 0,
        select: function (event, ui){}
    });                

});
</script>
--------------------------------------->
<!--------------------This line of code is for max id ----------------------->
<script>
	$(document).on('keypress',function(){
		if($("#id").val() == 0 ){
			$.ajax({
			 url:  "Masters_Liab/maxid.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
			$("#lid").val(d);
	}
		});

	}
	});
</script>

<?php include('footer.php'); ?>