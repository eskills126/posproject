<?php
include('header.php'); 
?>
<?php 
include 'db_connect.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mustajab Amjad</title>
	<meta charset="utf-8">



      <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

	
	<!-----------------------added for date design---------------->
	<link rel="stylesheet" type="text/css" href="Jquery_ui/jquery-ui.min.css">
	
	<!------------------------------------------------------------>
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

		<div class="container-fluid">
			<div class="">
				<h1>Product Entry Form</h1>
				
			</div>
			<div class="row">
				<div class="col-md-3">
					
		<!--------------------------Begining of Form------------------------------------>
					<form id="frm" action="" method="post">
					
					<div class="form-group">
							<label>Customer Name</label>
							<input type="text" name="cname" id="cname" placeholder="Enter Name" class="form-control" required="">
						</div>
		
					<div class="form-group">
							<label>Address</label>
							<input type="text" name="caddress" id="caddress" placeholder="Enter Address" class="form-control" required>
						</div>

					<div class="form-group">
							<label>Contact:</label>
							<input type="text" name="ccontac" id="ccontact" placeholder="Enter Contact Number" class="form-control" >
						</div>
					<div class="form-group">
							<label>Credit Limit</label>
							<input type="text" name="climit" id="climit" placeholder="Enter Credit Limit" class="form-control" >
						</div>

						
					<div class="form-group">
							<label>Opening Balance</label>
							<input type="text" name="copbal" id="copbal" placeholder="Enter Opening Balance" class="form-control" >
						</div>

					<div class="form-group">
							<label>Customer Area</label>
							<input type="text" name="carea" id="carea" placeholder="Enter Customer Area" class="form-control" >
						</div>
					<div class="form-group">
							<input type="hidden" id="id" name="id" value="0">
							<input type="button" class="btn btn-success" id="save" value="Add">
							</div>

					</form>
				</div>

	<div class="col-md-9" id="output">
		
	</div>
		</div>
			</div>
			

<script>
$(document).ready(function(){
	
	$("#output").load("Masters_Customers/view.php");

	$("#cname").focus();
	$("#save").click(function() {
		var id=$("#id").val();
		
		if (id==0){
		$.ajax({
			 url:  "Masters_Customers/insert.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
		$("<tr ></tr>").html(d).insertAfter($("#DESC"));
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


<?php include('footer.php'); ?>
<p>	<br> </p>

<script type="text/javascript" src="Jquery_ui/jquery.js"></script>
<script type="text/javascript" src="Jquery_ui/jquery-ui.js"></script>
<script type="text/javascript" src="Jquery_ui/jquery-ui.min.js"></script>


</body>
</html>
