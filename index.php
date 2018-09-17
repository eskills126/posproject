<?php 
include('header.php');
include_once("db_connect.php");
?>
<title>aanSoft</title>
<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/login.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen">

	<p><center> 
	<h2>Welcome aanSoft</h2>
	</p>
	<br>		
	<form class="form-login" method="post" id="login-form">
		<h2 class="form-login-heading">User Log In Form</h2><hr />
		<div id="error">
		</div>
		<div class="form-group">
			<input type="email" id="userid" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
			<span id="check-e"></span>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" id="password" />
		</div>
		<hr />
		<div class="form-group">
			
			<button type="submit" class="btn btn-default btn-lg" name="login_button" id="login_button">
			<i class="fa fa-sign-in <span class="glyphicon glyphicon-log-in"></i>&nbspSign In
			</button> 
		</div> 
	</form>		
		
</div>

<?php include('footer.php');?>