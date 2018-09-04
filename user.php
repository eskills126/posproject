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

<!--------Code for Session Compare-------->
<?php session_start();
$var=$_SESSION['user_session'];
$var2=$_SESSION['user_role'];
 ?>
<!--------code for admin rights-------->
<!--if any user manually try to access the http://localhost/posproject/user.php to see the Passwords etc...---->
<?php 
	if ($var2 != 1) {
	//return true;		
	header("Location: welcome.php");
	}
 ?>
<!--Code for Login Detail-->
<?php
include('header.php'); 
//session_start();
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
		<h2 class="page-header text-center"><i class="fa fa-edit"></i>&nbsp User's Profile</h2>
		</div>


	<div class="col-xs-6 col-sm-4">
	<div class="dropdown" align="right"id="logininfo">
  <button type="button" class="btn btn-primary d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-user-circle fa-3x" aria-hidden="false">&nbsp</i>Welcome <?php echo $row['user']; ?>&nbsp;<span class="caret"></span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i>View Profile</a>
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
        <label for="uname">User Name:</label>
      	</div>
      	<span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="text" id="uname" name="uname" placeholder="Enter User Name" required>
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="upassword">Password:</label>
      	</div>
      	<span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="password" id="upassword" name="upassword" placeholder="Enter Password" required style="border:2px solid #ccc;border-radius: 4px;height: 35px;">
      	</div>
    	</div>
		</div>
		
		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="rpassword">Retype Password:</label>
      	</div>
      	<span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="password" id="rpassword" name="rpassword" placeholder="Retype Password" required style="border:2px solid #ccc;border-radius: 4px;height: 35px;">
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="uemail">Email:</label>
      	</div>
      	<span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="email" size="30" id="uemail" name="uemail" placeholder="Enter Valid Email" required style="border:2px solid #ccc;border-radius: 4px;height: 35px;"><span id="email_feedback"></span>
      	</div>
    	</div>
		</div>

		<div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="utype">User Type:</label>
      	</div>
      	<span class="asterisk_input"></span>
      	<div class="col-75">
        <input type="number" id="utype" name="utype" placeholder="Enter user type"  min="1" max="2" required><div style="font-size: 11px;font-weight: bold; color: red;">*Value between 1 or 2.
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
<!------------Function for Admin Rights----------------


------------------------------------------------------>

<script>
$(document).ready(function(){
	$("#output").load("Masters_Users/view.php");
	$("#uname").focus();
	$("#save").click(function() {
		var id=$("#id").val();
		//if ($("#cname").val()=="" || $("#copbal").val()=="" || $("#carea").val()=="" )
		if ($("#uname").val()=="" ){
			alert("Please Add User Name ");
			$("#uname").focus();

		}else if($("#upassword").val()=="" ){
			alert("Please Add User Password ");
			$("#upassword").focus();
		
		}else if($("#rpassword").val()=="" ){
			alert("Please Re-Type Password ");
			$("#rpassword").focus();
		
		}else if($("#uemail").val()=="" ){
			alert("Please Add Valid E-Mail Address ");
			$("#uemail").focus();
		
		}else if($("#utype").val()=="" ){
			alert("Please Add User Type ");
			$("#utype").focus();
		
		}else if($("#utype").val() != 1 && $("#utype").val() != 2 ){
			alert("Please Type Value 1 For Admin OR 2 For User ");
			$("#utype").focus();
		
		}else if($("#upassword").val() !=  $("#rpassword").val() ){
			alert("Password Don't Match ");
			$("#rpassword").focus();
		
		}else if (id==0){
		$.ajax({
			 url:  "Masters_Users/insert.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
				$("#output").load("Masters_Users/view.php");
		//$("<tr ></tr>").html(d).insertAfter($("#DESC"));
		//$("#examples").html(d).appendTo("<tr></tr>");


		$("#frm")[0].reset();
		$("#uname").focus();
		//$("#cname").val('');
		
		$("#id").val("0");
			}

		});
	}else{
			$.ajax({
			url:  "Masters_Users/update.php",
			type:  "post",
			data: $("#frm").serialize(),
			success:function(d) {
			
		$("#output").load("Masters_Users/view.php");
		$("#frm")[0].reset();
		$("#uname").focus();
		$("#id").val("0");
			}

		});
		}
	});
	$(document).on("click",".del",function(){
		var del=$(this);
		var id = $(this).attr("data-id");
		$.ajax({
			url:  "Masters_Users/delete.php",
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
			$("#uname").val(name);
		var password = row.closest("tr").find("td:eq(2)").text();
		$("#upassword").val(password);
		var rpassword = row.closest("tr").find("td:eq(3)").text();
		$("#rpassword").val(rpassword);
		var email = row.closest("tr").find("td:eq(4)").text();
		$("#uemail").val(email);
		var type = row.closest("tr").find("td:eq(5)").text();
		$("#utype").val(type);
	});

});	
</script>
<!----------IF Admin then Access the User.php Page-----------
<script>
  $(document).ready(function(){
    if($("#user_role").val() != 1){
     // return true;
   // }  else{
      alert("You Are Not Admin");
      //return false;
    }
    });
  </script>
---------------------------------------------------------->
<!------------E-Mail Validation Code---------------->
<script>
function validate_email(email){
      $.post('Masters_Users/email.php',{uemail: email}, function(data){
        $('#email_feedback').text(data);
});
}
    $("#uemail").focusin(function(){

      if ($('#uemail').val() === ""){
        $('#email_feedback').text(''); 
        }else{
        validate_email($('#uemail').val() );
	}
    }).blur(function() {
      $('#email_feedback').text('');
    }).keyup(function(){
      validate_email($('#uemail').val() );
  });
</script>
<!---------Code for AutoComplete Area--------------
<script>
	 $(function() {
    
     $("#carea").autocomplete({
        source: "Masters_Users/autocomplete_area.php",
        minLength: 0,
        select: function (event, ui){}
    });                
});
</script>
-------------------------------------------------
<input type="text" id="user_id" value="<?php echo $var; ?>" >
<input type="text" id="user_role" value="<?php echo $var2; ?>" >
--------------------------------------------------->

<?php include('footer.php'); ?>
<p>
	<br>
	</p>
</div>