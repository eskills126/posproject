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
include_once("db_connect.php");
?>
<div class="container-fluid">
	<p>
		
  	<div class="row">
  			
	<div class="col-xs-6 col-sm-8 col-md-offset-4">
		<h2 class="page-header text-center"><i class="fa fa-edit"></i>&nbsp Cash Paid Transaction</h2>
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
</p>
</div>

<div class="container">
					
<form id="frm" action="" method="post">
  
  <!---------------------------------------------------------------->
<?php  
      $sql2 = "SELECT * FROM cashpaidtbl where cashid=(SELECT max(cashid) FROM cashpaidtbl) GROUP by cashid";
        $result = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        ?>  
        
        <div class="form-group" id="inumber">
          <div class="row">
        <div class="col-25">
        <label for="ino">No:</label>
        </div>
          <div class="col-25"><span class="asterisk_input"></span>
        <input type="number" class="form-control" id="ino" name="ino" placeholder="Invoice No." value="<?php echo $row['cashid'] + 1;  ?>"  readonly>
         <span id="error_id" class="text-danger"></span>
        </div>
        <?php 
            }
        }
        else{
            ?>
            <div class="form-group" id="inumber">
          <div class="row">
        <div class="col-25">
        <label for="ino">No:</label>
        </div>
          <div class="col-25"><span class="asterisk_input"></span>
        <input type="number" class="form-control" id="ino" name="ino" placeholder="Invoice No." value="1" readonly>
        <span id="error_id" class="text-danger"></span>
        </div>  
            <?php 
            }
             ?> 
     
      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="pdate">Date:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input id="pdate" data-inputmask="'alias': 'date'" name="pdate" value="<?php echo date('d/m/Y'); ?>" style="border:2px solid #ccc; border-radius: 4px;height: 35px;">
        <span id="error_date" class="text-danger"></span>
      	</div>
    	</div>
		</div>
<!------------------------------------------------------------------------------>
    <div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="acode">Account Code:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="text" id="acode" name="acode" placeholder="Enter Account Code" required ">
        </div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-60">
      	<input type="text"id="adetail" class="form-control" name="adetail" placeholder="Account Detail" readonly>
        </div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-25"style="width: 10%;">
      	<label for="abal">Cash Balance:</label>
      	</div>
      	<div class="col-25">
      	<input type="text" name="abal" id="abal" class="form-control" placeholder="Cash Balance"style="width:80%;background-color:#edf1f7;" readonly>
        <span id="error_sbal" class="text-danger"></span>
      	</div>
      	</div>
      	</div>

      <!---Remarks row----->
      <div class="form-group">
    	<div class="row">
        <div class="col-25">
          <label for="remarks">Remarks:</label>
        </div>
        <div class="col-75">
        <input type="text" id="remarks"name="remarks" placeholder="Enter Remarks"style="width: 107%;">
        </div>
      </div>
    </div>
        <!----------------------Amount row--------------------------->
        <div class="form-group">
        <div class="row">
        <div class="col-25">
        <label for="amount">Amount:</label>
      	</div>
      	<div class="col-25">
        <span class="asterisk_input"></span>
        <input type="number" id="amount" name="amount" placeholder="Amount..." style="border:2px solid #ccc; border-radius: 4px;height: 35px;" required>
        <span id="error_qty" class="text-danger"></span>
      </div>

      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="abal">Account Balance:</label>
      	</div>
      	<div class="col-25">
        <input type="number" id="abal" name="abal" required class="form-control" placeholder="Accounts Balance"readonly>
        <span id="error_sqty" class="text-danger"></span>
      	</div>
      </div>
    </div>

      
		<!---------------------Save Button------------------------->
      <div class="form-group">
      <div class="row">
      <div class="col-25">
      </div>
     <div class="col-75">  
    
      <button type="button" class="btn btn-success" id="save" value="Save Detail"><i class="fa fa-database fa-lg" aria-hidden="true"></i>&nbsp Save Detail</button>
      <input type="hidden" id="id" name="id" value="0">
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
<br>

<!------This code is for EnterIndex insted of TabIndex OK--------->
<script>
	$(document).ready(function(){

inputs = $("form :input");
$(inputs).keypress(function(e){
	  if (e.keyCode == 13){
		  inputs[inputs.index(this)+1].focus();
	  }
});
});
</script>
<!---------------------------------------------------->
<script>
$(document).ready(function(){
  $("#output").load("Transaction_CashPaid/view.php");
  $("#pdate").focus();
  $("#save").click(function() {
    var id=$("#id").val();
    
    if ($("#acode").val()=="" ){
        alert("Please Add Account Code ");
        $("#acode").focus();

    }else if($("#adetail").val()=="" ){
      alert("Please Add Payer Name ");
      $("#adetail").focus();
    
    }else if($("#amount").val()== 0 ){
      alert("Please Add Amount ");
      $("#amount").focus();
    
    }else if (id==0){
    $.ajax({
       url:  "Transaction_CashPaid/insert.php",
      type:  "post",
      data: $("#frm").serialize(),
      success:function(d) {
        $("#output").load("Transaction_CashPaid/view.php");
    //$("<tr ></tr>").html(d).insertAfter($("#DESC"));
    //$("#examples").html(d).appendTo("<tr></tr>");

    $("#frm")[0].reset();
    $("#pdate").focus();
    //$("#cname").val('');
    
    $("#id").val("0");
      }

    });
  }else{
      $.ajax({
      url:  "Transaction_CashPaid/update.php",
      type:  "post",
      data: $("#frm").serialize(),
      success:function(d) {
      
    $("#output").load("Transaction_CashPaid/view.php");
    $("#frm")[0].reset();
    $("#pdate").focus();
    $("#id").val("0");
      }
    });
    }
  });
  $(document).on("click",".del",function(){
    var del=$(this);
    var id = $(this).attr("data-id");
    $.ajax({
      url:  "Transaction_CashPaid/delete.php",
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

    var id = row.closest("tr").find("td:eq(2)").text();
      $("#ino").val(id);
    var pdate = row.closest("tr").find("td:eq(3)").text();
      $("#pdate").val(pdate);  
    var acode = row.closest("tr").find("td:eq(4)").text();
    $("#acode").val(acode);
    var adetail = row.closest("tr").find("td:eq(5)").text();
    $("#adetail").val(adetail);
    var remarks = row.closest("tr").find("td:eq(6)").text();
    $("#remarks").val(remarks);
    var amount = row.closest("tr").find("td:eq(7)").text();
    $("#amount").val(amount);

    
  });

}); 
</script>
<!---------Code for AutoComplete Area---------->
<script>
   $(function() {
    
     $("#acode").autocomplete({
        source: "Transaction_CashPaid/autocomplete_area.php",
        minLength: 0,
        select: function (event, ui){}
    });                

});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#acode").on('keyup',function(){
      var updatedname = $(this).val();
      
        $.ajax({
          type: 'POST',
          url: 'Transaction_CashPaid/namedynamicupdate.php',
          data:{acode:updatedname},
          success:function(data){
              $("#adetail").val(data);
          }
        });
      });
    });
</script>
<script>
  $("#pdate").inputmask();
</script>
<?php include('footer.php'); ?>