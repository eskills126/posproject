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


<?php include('navbar.php'); ?>


<div class="container">
					
<form id="frm" action="" method="post">

		<div class="form-group">
    	<div class="row">
      	<div class="col-25"></div>
        <div class="col-75">

        <h1 style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-weight: bold;"><i class="fa fa-edit"></i> Supplier's Profile
        </h1>
      	</div>
      </div>
      </div>
      
		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="sname">Supplier Name:</label>
      	</div>
      	<span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="text" id="sname" name="sname" placeholder="Enter Supplier Name" required>
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="saddress">Address:</label>
      	</div>
      	<div class="col-75">
        <input type="text" id="saddress" name="saddress" placeholder="Enter Supplier's Address">
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="scontact">Cotact:</label>
      	</div>
      	<div class="col-75">
        <input type="text" id="scontact" name="scontact" placeholder="Enter Suppliers's Contact">
      	</div>
    	</div>
		</div>
		
		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="sopbal">Opening Balance:</label>
        </div>
        <span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="number" id="sopbal" name="sopbal" placeholder="Enter Opening Balance"required>
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
	$("#output").load("Masters_Suppliers/view.php");
	$("#sname").focus();
	$("#save").click(function() {
		var id=$("#id").val();
		//if ($("#cname").val()=="" || $("#copbal").val()=="" || $("#carea").val()=="" )
		if ($("#sname").val()=="" ){
			alert("Please Add Supplier Name ");
			$("#sname").focus();

		}else if($("#sopbal").val()=="" ){
			alert("Please Add Suppliers Opening Balance ");
			$("#sopbal").focus();
		
		}else if (id==0){
		$.ajax({
			 url:  "Masters_Suppliers/insert.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
				$("#output").load("Masters_Suppliers/view.php");
		//$("<tr ></tr>").html(d).insertAfter($("#DESC"));
		//$("#examples").html(d).appendTo("<tr></tr>");
		$("#frm")[0].reset();
		$("#sname").focus();
		//$("#cname").val('');
		$("#id").val("0");
			}

		});
	}else{
			$.ajax({
			url:  "Masters_Suppliers/update.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
			
		$("#output").load("Masters_Suppliers/view.php");
		$("#frm")[0].reset();
		$("#sname").focus();
		$("#id").val("0");
			}

		});
		}
	});
	$(document).on("click",".del",function(){
		var del=$(this);
		var id = $(this).attr("data-id");
		$.ajax({
			url:  "Masters_Suppliers/delete.php",
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
			$("#sname").val(name);
		var address = row.closest("tr").find("td:eq(2)").text();
		$("#saddress").val(address);
		var contact = row.closest("tr").find("td:eq(3)").text();
		$("#scontact").val(contact);
		var opbal = row.closest("tr").find("td:eq(4)").text();
		$("#sopbal").val(opbal);
	});

});	
</script>
<!---------Code for AutoComplete Area--------
<script>
	 $(function() {
         $("#carea").autocomplete({
        source: "Masters_Suppliers/autocomplete_area.php",
        minLength: 0,
        select: function (event, ui){}
    });                
});
</script>
--------------------------------------------->


<?php include('footer.php'); ?>