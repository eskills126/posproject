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
		<h2 class="page-header text-center"><i class="fa fa-edit"></i>&nbsp General Transaction</h2>
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
      $sql2 = "SELECT * FROM gttbl where gtid=(SELECT max(gtid) FROM gttbl) GROUP by gtid";
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
        <input type="number" id="ino" name="ino" placeholder="Invoice No." value="<?php echo
         $row['gtid'] + 1;  ?>"  readonly>
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
        <input type="number" id="ino" name="ino" placeholder="Invoice No." value="1" readonly>
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
<!--------------------------------------------------------------------------------------------------->
<!--------------------------------first row---------------------------------------------------------->
		
    <div class="form-group">
    	<div class="row">
      	<div class="col-25">
        <label for="dcode">DR Account Code:</label>
      	</div>
      	<div class="col-25"><span class="asterisk_input"></span>
        <input type="text" id="dcode" name="dcode" placeholder="Debitor Account Code" required ">
        <span id="error_scode" class="text-danger"></span>
      	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-60">
      	<input type="text"id="adetail" name="adetail" placeholder="Account Detail"style="width: 95%;background-color:#edf1f7;" readonly>
        <span id="error_sname" class="text-danger"></span>
       	</div>
      	<div class="col-25" style="width:0.5%;"></div>
      	<div class="col-25"style="width: 10%;">
      	<label for="abal">Balance:</label>
      	</div>
      	<div class="col-25">
      	<input type="text" name="abal" id="abal" placeholder="Account Balance"style="width:80%;background-color:#edf1f7;" readonly>
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
<!------------------------------------------------------------------------------------>    
<hr style="border-style: solid;border-width: 2px;">
<!------------------------------------------------------------------------------------>
 <div class="form-group">
      <div class="row">
        <div class="col-25">
        <label for="ccode">CR Account Code:</label>
        </div>
        <div class="col-25"><span class="asterisk_input"></span>
        <input type="text" id="ccode" name="ccode" placeholder="Creditor Account Code" required ">
        <span id="error_scode" class="text-danger"></span>
        </div>
        <div class="col-25" style="width:0.5%;"></div>
        <div class="col-60">
        <input type="text"id="cdetail" name="cdetail" placeholder="Account Detail"style="width: 95%;background-color:#edf1f7;" readonly>
        <span id="error_sname" class="text-danger"></span>
        </div>
        <div class="col-25" style="width:0.5%;"></div>
        <div class="col-25"style="width: 10%;">
        <label for="abal">Balance:</label>
        </div>
        <div class="col-25">
        <input type="text" name="abal" id="abal" placeholder="Account Balance"style="width:80%;background-color:#edf1f7;" readonly>
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
        <input type="text" id="cremarks"name="cremarks" placeholder="Enter Remarks"style="width: 107%;">
        </div>
      </div>
    </div>
    
        <!---Amount row----->
        <div class="form-group">
        <div class="row">
        <div class="col-25">
        <label for="amount">Amount:</label>
      	</div>
      	<div class="col-25">
        <span class="asterisk_input"></span>
        <input type="number" id="amount" name="amount" placeholder="Amount..." style="border:2px solid #ccc; border-radius: 4px;height: 35px;" >
        <span id="error_qty" class="text-danger"></span>
      </div>

      	<div class="col-25" style="width:0.5%;"></div>
    	<div class="col-25">
        <label for="abal">Current Balance:</label>
      	</div>
      	<div class="col-25">
        <input type="number" id="curbal" name="curbal" required style="border:2px solid #ccc; border-radius: 4px;height: 35px;background-color:#edf1f7;" placeholder="Current Balance"readonly>
        <span id="error_sqty" class="text-danger"></span>
      	</div>
      </div>
    </div>

      
		<!---------------------Save and Edit Button------------------------->
      <div class="form-group">
      <div class="row">
      <div class="col-25">
      </div>
     <div class="col-75">  
     	<button type="button" class="btn btn-success" id="save" value="Save Detail"><i class="fa fa-database fa-lg" aria-hidden="true"></i>&nbsp Save Detail</button>
      <input type="text" id="id" name="id" value="0" >
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

<script>
$(document).ready(function(){
  $("#output").load("Transaction_GT/view.php");
  $("#dcode").focus();
  $("#save").click(function() {
    var id=$("#id").val();
    
    if ($("#dcode").val()=="" ){
        alert("Please Add Dr. Account Code ");
        $("#dcode").focus();

    }else if($("#adetail").val()=="" ){
      alert("Please Add Dr. Name ");
      $("#adetail").focus();
    
    }else if($("#remarks").val()=="" ){
      alert("Please Add Dr. Remarks ");
      $("#remarks").focus();
    
    }
//-------------------------------------------------------------------
    else if ($("#ccode").val()=="" ){
        alert("Please Add Cr. Account Code ");
        $("#ccode").focus();

    }else if($("#cdetail").val()=="" ){
      alert("Please Add Cr. Name ");
      $("#cdetail").focus();
    
    }else if($("#cremarks").val()=="" ){
      alert("Please Add Cr. Remarks ");
      $("#cremarks").focus();
    
    }


    else if($("#amount").val()== 0 ){
      alert("Please Add Amount ");
      $("#amount").focus();
    
    }else if (id==0){
    $.ajax({
       url:  "Transaction_GT/insert.php",
      type:  "post",
      data: $("#frm").serialize(),
      success:function(d) {
        $("#output").load("Transaction_GT/view.php");
    //$("<tr ></tr>").html(d).insertAfter($("#DESC"));
    //$("#examples").html(d).appendTo("<tr></tr>");

    $("#frm")[0].reset();
    $("#dcode").focus();
    //$("#cname").val('');
    
    $("#id").val("0");
      }

    });
  }else{
      $.ajax({
      url:  "Transaction_GT/update.php",
      type:  "post",
      data: $("#frm").serialize(),
      success:function(d) {
      
    $("#output").load("Transaction_GT/view.php");
    $("#frm")[0].reset();
    $("#dcode").focus();
    $("#id").val("0");
      }
    });
    }
  });
  $(document).on("click",".del",function(){
    var del=$(this);
    var id = $(this).attr("data-id");
    $.ajax({
      url:  "Transaction_GT/delete.php",
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

    var dcode = row.closest("tr").find("td:eq(4)").text();
    $("#dcode").val(dcode);
    var adetail = row.closest("tr").find("td:eq(5)").text();
    $("#adetail").val(adetail);
    var remarks = row.closest("tr").find("td:eq(6)").text();
    $("#remarks").val(remarks);

var ccode = row.closest("tr").find("td:eq(7)").text();
    $("#ccode").val(ccode);
    var cdetail = row.closest("tr").find("td:eq(8)").text();
    $("#cdetail").val(cdetail);
    var cremarks = row.closest("tr").find("td:eq(9)").text();
    $("#cremarks").val(cremarks);

    var amount = row.closest("tr").find("td:eq(10)").text();
    $("#amount").val(amount);

    
  });

}); 
</script>
<!---------Code for AutoComplete Area---------->
<script>
   $(function() {
    
     $("#dcode").autocomplete({
        source: "Transaction_GT/autocomplete_area.php",
        minLength: 0,
        select: function (event, ui){}
    });                

});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#dcode").on('keyup',function(){
      var updatedname = $(this).val();
      
        $.ajax({
          type: 'POST',
          url: 'Transaction_GT/namedynamicupdate.php',
          data:{acode:updatedname},
          success:function(data){
              $("#adetail").val(data);
          }
        });
      });
    });
</script>
<!--------------------------------------------------------------------->
<script>
   $(function() {
    
     $("#ccode").autocomplete({
        source: "Transaction_GT/autocomplete_area.php",
        minLength: 0,
        select: function (event, ui){}
    });                
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#ccode").on('keyup',function(){
      var updatedname = $(this).val();
      
        $.ajax({
          type: 'POST',
          url: 'Transaction_GT/namedynamicupdate.php',
          data:{acode:updatedname},
          success:function(data){
              $("#cdetail").val(data);
          }
        });
      });
    });
</script>



<script>
  $("#pdate").inputmask();
</script>
<?php include('footer.php'); ?>