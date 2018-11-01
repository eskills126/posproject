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

<div class="container-fluid">
	<p>
		
  	<div class="row">
  			
	<div class="col-xs-6 col-sm-8 col-md-offset-4">
		<h2 class="page-header text-center"><i class="fa fa-edit"></i>Sales Area/Territories Description</h2>
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

  <!-------------------------Form elements------------------------------------>    
		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="customer_id">ID:</label>
      	</div>
      	<div class="col-75">
        <input type="text" id="said" name="said" class="form-control" value="" readonly="" required>
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="aname">Area Name:</label>
      	</div>
      	<span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="text" id="aname" name="aname" placeholder="Enter Area Name">
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

        <input type="" style="width: 0%; border-style:none;">
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
	$("#output").load("Masters_SalesArea/view.php");
	$("#aname").focus();
	$("#save").click(function() {
		var id=$("#id").val();
		//if ($("#cname").val()=="" || $("#copbal").val()=="" || $("#carea").val()=="" )
		if ($("#aname").val()=="" ){
			alert("Please Add Area Name ");
			$("#aname").focus();

		}else if (id==0){
		$.ajax({
			 url:  "Masters_SalesArea/insert.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
				$("#output").load("Masters_SalesArea/view.php");
		//$("<tr ></tr>").html(d).insertAfter($("#DESC"));
		//$("<tr ></tr>").html(d).insertAfter($("#abc"));
		//$("#examples").prepend($("<tr></tr>")).html(d);
		//$("#examples").appendTo($("<tr></tr>")).html(d);
		
		//$("#examples").html(d).appendTo("<tr></tr>");


		$("#frm")[0].reset();
		$("#aname").focus();
		//$("#cname").val('');
		
		$("#id").val("0");
			}

		});
	}else{
			$.ajax({
			url:  "Masters_SalesArea/update.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
			
		$("#output").load("Masters_SalesArea/view.php");
		$("#frm")[0].reset();
		$("#aname").focus();
		$("#id").val("0");
			}

		});
		}
	});
	$(document).on("click",".del",function(){
		var del=$(this);
		var id = $(this).attr("data-id");
		$.ajax({
			url:  "Masters_SalesArea/delete.php",
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

		var said = row.closest("tr").find("td:eq(0)").text();
			$("#said").val(said);
		var name = row.closest("tr").find("td:eq(1)").text();
			$("#aname").val(name);

			$("#aname").focus();
	});

});	
</script>
<!---------Code for AutoComplete Area------
<script>
	 $(function() {
    
     $("#carea").autocomplete({
        source: "Masters_SalesArea/autocomplete_area.php",
        minLength: 0,
        select: function (event, ui){}
    });                

});
</script>
------------------------------------------>
<!--------------------This line of code is for max id ----------------------->
<script>
	$(document).on('keypress',function(){
		if($("#id").val() == 0 ){
			$.ajax({
			 url:  "Masters_SalesArea/maxid.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
			$("#said").val(d);
	}
		});

	}
	});
</script>

<?php include('footer.php'); ?>