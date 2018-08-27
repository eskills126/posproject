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
<link rel="stylesheet" href="css/form.css">
<div class="container-fluid">
	<p>
<!--	<div class="row"> -->
  	<div class="row">
  			
	<div class="col-xs-6 col-sm-8 col-md-offset-4">
		<h2 class="page-header text-center"><i class="fa fa-edit"></i>Expense Account</h2>
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
</div></p>

<div class="container">
  <form id="sfrm">
	
		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="etitle">Expense Title:</label>
      	</div>
      	<div class="col-75">
        <input type="text" id="etitle" name="etitle" placeholder="Enter Expense Name">
      	</div>
    	</div>
		</div>

    	<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="eopbal">Opening Balance:</label>
      	</div>
      	<div class="col-75">
        <input type="number" id="eopbal" name="eopbal" placeholder="Enter Opening Balance">
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
    	<div class="col-sx-12 col-md-3 col-md-offset-6">
    	<input type="hidden" id="id" name="id" value="0">
    	<input type="submit" value="Save Details" id="save">
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