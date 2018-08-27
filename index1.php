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
<style type="text/css" media="screen">
.container-fluid{
	
    min-height: 100%;
    
    
}

</style>
<div class="container-fluid">
	<p>
<!--	<div class="row"> -->
  	<div class="row">
  			<div class="col-xs-12 col-sm-4">
  			</div>
				<div class="col-xs-6 col-sm-4 col-md-offset-4"style="padding: 20px; outline: 2px solid #ccc;outline-offset: -10px;">
					<h4 class="page-header text-center"><i class="fa fa-edit"></i>Customer's Profile</h4>
						<form id="frm">
					<div class="form-group">
					<label>Customer Name</label>
					<input type="text" name="name" id="name" placeholder="Enter Name" class="form-control"></div>
					<div class="form-group">
					<label>Age</label>
					<input type="text" name="age" id="age" placeholder="Enter Age" class="form-control">
					</div>
					<div class="form-group">
					<label>City</label>
					<input type="text" name="city" id="city" placeholder="Enter City" class="form-control"></div>
					<div class="form-group">
					<input type="hidden" id="id" name="id" value="0"><input type="button" class="btn btn-success" id="save" value="Save Details"></div>
		</form> 
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

<div class="row">
<div class="col-xs-6 col-sm-2"></div>
<div class="col-xs-12 col-sm-8 col-md-offset-4" id="output">
</div>
<div class="col-xs-6 col-sm-2"></div>
</div>
</p>
<script>
$(document).ready(function(){
	$("#output").load("view.php");
	$("#save").click(function() {
		var id=$("#id").val();
		
	if (id==0){
		$.ajax({
			url:    "insert.php",
			type:   "post",
			data:   $("#frm").serialize(),

			success:function(d) {
//alert(d); // After form complete disable this alert
				
		$("<tr></tr>").html(d).appendTo(".table");
		$("#frm")[0].reset();
		$("#id").val("0");
			}

		});
	}else{
			$.ajax({
			url:    "update.php",
			type:   "post",
			data:   $("#frm").serialize(),
			success:function(d) {
			
		$("#output").load("view.php");
		$("#frm")[0].reset();
		$("#id").val("0");
			}

		});
	
	}

	});
	$(document).on("click",".del",function(){
		var del=$(this);
		var id = $(this).attr("data-id");
		$.ajax({
			url:    "delete.php",
			type:   "post",
			data:   {id:id},
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

		var name = row.closest("tr").find("td:eq(0)").text();
		$("#name").val(name);
		var age = row.closest("tr").find("td:eq(1)").text();
		$("#age").val(age);
		var city = row.closest("tr").find("td:eq(2)").text();
		$("#city").val(city);
	});

});	

</script>


<?php 
include('footer.php');
?>
<p>
	<br>
	</p>
</div>