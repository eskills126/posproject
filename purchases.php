<?php 
include('header.php');
include_once("db_connect.php");
?>
<title>Purchase Entry Form</title>
<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/purchases.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
<?php include('container.php');?>
<div class="container">
	<h2><center>Purchase Entry Form</h2></center>		
	<form class="form-purchases" method="post" id="purchases-form">
		<h2 class="form-purchases-heading">User Log In Form</h2><hr />
		<div id="error">
		</div>
		<div class="form-group">
			<input type="PurOrderId" class="form-control" placeholder="Email address" name="PurOrderId" id="PurOrderID" />
			<span id="check-e"></span>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" id="password" />
		</div>
		<hr />
		<div class="form-group">
			<button type="submit" class="btn btn-default" name="login_button" id="login_button">
			<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
		</div> 
	</form>		
		
</div>
<?php include('footer.php');?>