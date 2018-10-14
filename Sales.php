<?php
//------ This code is to remove the following error-----------
//---Cannot modify header information - headers already sent by... ----
 ob_start(); ?>
<?php
  //invoice.php  
   include('db_connect.php');
   include('navbar.php');
//   include('header.php');

//---------Create invoice Mysql INSERT Code-------------------------
  $statement = $connect->prepare("
    SELECT * FROM tbl_order 
    ORDER BY order_id DESC
  ");

  $statement->execute();

  $all_result = $statement->fetchAll();

  $total_rows = $statement->rowCount();

//------Create Invoice----Insert Data into Table--------------------
  if(isset($_POST["create_invoice"]))
  { 

$edata=$_POST["order_receiver_name"];
$result =preg_replace('/.*-/', '', $edata);

    $order_total_before_discount_freight = 0;
    $order_total_discount_percentage = 0;
    $order_total_discount_value = 0;
    $order_total_freight = 0;
    //$order_total_tax = 0;
    $order_total_after_discount_freight = 0;
    $statement = $connect->prepare("
      INSERT INTO tbl_order 
  (order_no, order_date, order_receiver_name, order_receiver_remarks, order_total_before_discount_freight, order_total_discount_percentage, order_total_discount_value, order_total_freight, order_total_after_discount_freight,order_datetime)
        VALUES (:order_no, :order_date, :order_receiver_name, :order_receiver_remarks, :order_total_before_discount_freight, :order_total_discount_percentage, :order_total_discount_value, :order_total_freight, :order_total_after_discount_freight, :order_datetime)
    ");
    $statement->execute(
      array(
      ':order_no'                             =>  trim($_POST["order_no"]),
      ':order_date'                           =>  trim($_POST["order_date"]),
      //':order_receiver_name'                   =>  trim($_POST["order_receiver_name"]),
      ':order_receiver_name'                  =>  trim($result), 
      ':order_receiver_remarks'               =>  trim($_POST["order_receiver_remarks"]),
      ':order_total_before_discount_freight'  =>  $order_total_before_discount_freight,
      ':order_total_discount_percentage'      =>  $order_total_discount_percentage,
      ':order_total_discount_value'           =>  $order_total_discount_value,
      ':order_total_freight'                  =>  $order_total_freight,
      ':order_total_after_discount_freight'   =>  $order_total_after_discount_freight,
      ':order_datetime'                       =>  date("Y-m-d")
      )
    );

      $statement = $connect->query("SELECT LAST_INSERT_ID()");
      $order_id = $statement->fetchColumn();

      for($count=0; $count<$_POST["total_item"]; $count++)
      {
        $order_total_before_discount_freight = $order_total_before_discount_freight + floatval(trim($_POST["order_item_gamount"][$count]));
//------------------------------------------------------------------------------------------
$item_name_value=$_POST["item_name"];
$item_name =preg_replace('/.*-/', '', $item_name_value);

$whname_value=$_POST["order_item_whname"];
$wh_name =preg_replace('/.*-/', '', $whname_value);


        $statement = $connect->prepare("
          INSERT INTO tbl_order_item 
          (order_id, item_name, order_item_whname, order_item_quantity, order_item_squantity, order_item_prate, order_item_grate, order_item_gamount)
          VALUES (:order_id, :item_name, :order_item_whname, :order_item_quantity, :order_item_squantity, :order_item_prate, :order_item_grate, :order_item_gamount)
        ");

        $statement->execute(
          array(
            ':order_id'                 =>  $order_id,
       //   ':item_name'               =>  trim($_POST["item_name"][$count]),
       //   ':order_item_whname'              =>  trim($_POST["order_item_whname"][$count]),
            ':item_name'                =>  trim($item_name[$count]),
            ':order_item_whname'        =>  trim($wh_name[$count]),
            ':order_item_quantity'      =>  trim($_POST["order_item_quantity"][$count]),
            ':order_item_squantity'     =>  trim($_POST["order_item_squantity"][$count]),
            ':order_item_prate'         =>  trim($_POST["order_item_prate"][$count]),
            ':order_item_grate'         =>  trim($_POST["order_item_grate"][$count]),
            ':order_item_gamount'       =>  trim($_POST["order_item_gamount"][$count])

          )
        );
      }
  $order_total_discount_percentage = $order_total_discount_percentage + floatval(trim($_POST["order_total_discount_percentage"]));
  $order_total_discount_value = $order_total_discount_value + floatval(trim($_POST["order_total_discount_value"]));
  $order_total_freight = $order_total_freight + floatval(trim($_POST["order_total_freight"]));

$order_total_after_discount_freight = $order_total_before_discount_freight - $order_total_discount_value + $order_total_freight;

      $statement = $connect->prepare("
        UPDATE tbl_order 
        SET order_total_before_discount_freight = :order_total_before_discount_freight, 
        order_total_discount_percentage = :order_total_discount_percentage,
        order_total_discount_value = :order_total_discount_value, 
        order_total_freight = :order_total_freight, 
        order_total_after_discount_freight = :order_total_after_discount_freight 
        WHERE order_id = :order_id 
      ");
      $statement->execute(
        array(
          ':order_total_before_discount_freight'     =>  $order_total_before_discount_freight,
          ':order_total_discount_percentage'         =>  $order_total_discount_percentage,
          ':order_total_discount_value'         =>  $order_total_discount_value,
          ':order_total_freight'         =>  $order_total_freight,
          ':order_total_after_discount_freight'      =>  $order_total_after_discount_freight,
          ':order_id'             =>  $order_id
        )
      );
      header("location:sales.php");
      //------ This code is to remove the following error-----------
//---Cannot modify header information - headers already sent by... ----      
      ob_end_flush();
  }



//--------------------Updating / Edit Invoice-----------------------------
  if(isset($_POST["update_invoice"]))
  {
    $order_total_before_discount_freight = 0;
      $order_total_discount_percentage = 0;
      $order_total_discount_value = 0;
      $order_total_freight = 0;
      //$order_total_tax = 0;
      $order_total_after_discount_freight = 0;
      
      $order_id = $_POST["order_id"];
            
      $statement = $connect->prepare("
                DELETE FROM tbl_order_item WHERE order_id = :order_id
            ");
            $statement->execute(
                array(
                    ':order_id'       =>      $order_id
                )
            );
      
      for($count=0; $count<$_POST["total_item"]; $count++)
      {
  $order_total_before_discount_freight =$order_total_before_discount_freight + floatval(trim($_POST["order_item_gamount"][$count]));
 //----------------------------------------------------- 
$item_name_value=$_POST["item_name"];
$item_name =preg_replace('/.*-/', '', $item_name_value);

$whname_value=$_POST["order_item_whname"];
$wh_name =preg_replace('/.*-/', '', $whname_value);


        $statement = $connect->prepare("
   INSERT INTO tbl_order_item 
   (order_id, item_name, order_item_whname, order_item_quantity, order_item_squantity,order_item_prate, order_item_grate, order_item_gamount) 
   VALUES (:order_id, :item_name, :order_item_whname, :order_item_quantity, :order_item_squantity, :order_item_prate, :order_item_grate, :order_item_gamount)
        ");
        $statement->execute(
          array(
            ':order_id'                 =>  $order_id,
//          ':item_name'                =>  trim($_POST["item_name"][$count]),
//          ':order_item_whname'        =>  trim($_POST["order_item_whname"][$count]),
            ':item_name'                =>  trim($item_name[$count]),
            ':order_item_whname'        =>  trim($wh_name[$count]),
            ':order_item_quantity'      =>  trim($_POST["order_item_quantity"][$count]),
            ':order_item_squantity'     =>  trim($_POST["order_item_squantity"][$count]),
            ':order_item_prate'         =>  trim($_POST["order_item_prate"][$count]),
            ':order_item_grate'         =>  trim($_POST["order_item_grate"][$count]),
            ':order_item_gamount'       =>  trim($_POST["order_item_gamount"][$count]),
            )
        );
        $result = $statement->fetchAll();
      }
      //$order_total_tax = $order_total_tax1 + $order_total_tax2 + $order_total_tax3;
  $order_total_discount_percentage = floatval(trim($_POST["order_total_discount_percentage"]));
  $order_total_discount_value = floatval(trim($_POST["order_total_discount_value"]));
  $order_total_freight = floatval(trim($_POST["order_total_freight"])); 

  $order_total_after_discount_freight = $order_total_before_discount_freight - $order_total_discount_value + $order_total_freight;
//---------------------------------------------------------------
$edata=$_POST["order_receiver_name"];
$result =preg_replace('/.*-/', '', $edata);


      $statement = $connect->prepare("
        UPDATE tbl_order 
        SET order_no = :order_no, 
        order_date = :order_date, 
        order_receiver_name = :order_receiver_name, 
        order_receiver_remarks = :order_receiver_remarks, 
        order_total_before_discount_freight = :order_total_before_discount_freight, 
        order_total_discount_percentage = :order_total_discount_percentage, 
        order_total_discount_value = :order_total_discount_value, 
        order_total_freight = :order_total_freight, 
        order_total_after_discount_freight = :order_total_after_discount_freight 
        WHERE order_id = :order_id 
      ");
      
      $statement->execute(
        array(
    ':order_no'                             =>  trim($_POST["order_no"]),
    ':order_date'                           =>  trim($_POST["order_date"]),
    ':order_receiver_name'                  =>  trim($result),
    ':order_receiver_remarks'               =>  trim($_POST["order_receiver_remarks"]),
    ':order_total_before_discount_freight'  =>  $order_total_before_discount_freight,
    ':order_total_discount_percentage'      =>  $order_total_discount_percentage,
    ':order_total_discount_value'           =>  $order_total_discount_value,
    ':order_total_freight'                  =>  $order_total_freight,
    ':order_total_after_discount_freight'   =>  $order_total_after_discount_freight,
    ':order_id'                             =>  $order_id
        )
      );
      
      $result = $statement->fetchAll();
            
      header("location:sales.php");
//------ This code is to remove the following error-----------
//---Cannot modify header information - headers already sent by... ----      
      ob_end_flush();
  }

//-----------------Delete Code --------------------------
  if(isset($_GET["delete"]) && isset($_GET["id"]))
  {
    $statement = $connect->prepare("DELETE FROM tbl_order WHERE order_id = :id");
    $statement->execute(
      array(
        ':id'       =>      $_GET["id"]
      )
    );
    $statement = $connect->prepare(
      "DELETE FROM tbl_order_item WHERE order_id = :id");
    $statement->execute(
      array(
        ':id'       =>      $_GET["id"]
      )
    );
    header("location:sales.php");
  //------ This code is to remove the following error-----------
//---Cannot modify header information - headers already sent by... ----      
      ob_end_flush();
  }
    ?>
   
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <!---------------------------------------------
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
------------------------>

    
  </head>
  <body>
    <style>
      .box
      {
      width: 100%;
      max-width: 1390px;
      border-radius: 5px;
      border:1px solid #ccc;
      padding: 15px;
      margin: 0 auto;                
      margin-top:50px;
      box-sizing:border-box;
      }
    </style>
<!-----------------------------------------------------
    <link rel="stylesheet" href="css/datepicker.css">
    <script src="js/bootstrap-datepicker1.js"></script>
----------------------------------------------------------->    
    <!--------------------------------------
    <script>
      $(document).ready(function(){
        $('#order_date').datepicker({
          format: "yyyy-mm-dd",
          autoclose: true
        });
      });
    </script>
    ----------------------------------------->
    <div class="container-fluid">
      <?php
      if(isset($_GET["add"]))
      {
      ?>
      <!----onkeypress="return event.keyCode != 13;"  --->
      <br>
      <form method="post" id="invoice_form" >
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td colspan="6" align="center"><h2 style="margin-top:10.5px"><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp Create Invoice</h2></td>
            </tr>
            <tr>
                <td colspan="6">
                  <div class="row">
                    <div class="col-md-8">
                      To,<br />
                        <b>RECEIVER (BILL TO)</b><br />
                        <input type="text" name="order_receiver_name" id="order_receiver_name" class="form-control input-sm" placeholder="Enter Receiver Name" />
                        <b>Remarks</b><br />
                        <input type="text" name="order_receiver_remarks" id="order_receiver_remarks" class="form-control" placeholder="Enter Billing Address">
                    </div>
        <!-------------------------------------------------->
                    <?php  
      $connect = "SELECT * FROM tbl_order where order_no=(SELECT max(order_no) FROM tbl_order) GROUP by order_no";
        $result = mysqli_query($conn,$connect);
        if (mysqli_num_rows($result) > 0) {   
        while($row=mysqli_fetch_array($result)) {
        ?>  
        <!-------------------------------------------------->
        <div class="col-md-4">
          <br />
          <b> Invoice No. </b><br />
          <input type="text" name="order_no" id="order_no" class="form-control input-sm" placeholder="Enter Invoice No." value="<?php echo $row['order_no'] + 1;  ?>" readonly/>
           <input type="text" data-inputmask="'alias': 'date'" name="order_date" id="order_date" value="<?php echo date('d/m/Y'); ?>" class="form-control input-sm" />
           <b>Opening Balance</b><br />
                        <input type="text" name="opbal" id="opbal" class="form-control input-sm" placeholder="Opening Balance"readonly="" />
                        
        </div>
        <?php 
            }
        }
        else{
            ?>
            <div class="col-md-4">
          <b> Invoice No. </b><br />
          <input type="text" name="order_no" id="order_no" class="form-control input-sm" placeholder="Enter Invoice No." value="1"; readonly="" >" />
           <input type="text" data-inputmask="'alias': 'date'" name="order_date" id="order_date" value="<?php echo date('d/m/Y'); ?>" class="form-control input-sm" />
           <b>Opening Balance</b><br />
                        <input type="text" name="opbal" id="opbal" class="form-control input-sm" placeholder="Opening Balance" readonly="" />
                        
        </div>  
            <?php 
            }
             ?> 
                  </div>
                  <br />
                  <table id="invoice-item-table" class="table table-bordered">
                    <tr>
                      <th width="2%">Sr#</th>
                      <th width="20%">Item Name</th>
                      <th width="20%">Warehouse Name</th>
                      <th width="5%">Quantity</th>
                      <th width="5%">Stock Quantity</th>
                      <th width="5%">Previous Rate</th>
                      <th width="7%">Gross Rate</th>
                      <th width="8%">Gross Amount</th>
                      <th width="3%">+/-</th>
                    </tr>
                            
             <tr>
    <td><span id="sr_no">1</span></td>
    <!----------Item Name------------->
    <td><input type="text" name="item_name[]" id="item_name1" class="form-control input-sm"  autocomplete="on" /></td>
    <!----------Warehouse Name------------->
  <td><input type="text" name="order_item_whname[]" id="order_item_whname1" data-srno="1" class="form-control input-sm order_item_whname" /></td>
  <!----------Quantity------------->
  <td><input type="text" name="order_item_quantity[]" id="order_item_quantity1" data-srno="1" class="form-control input-sm order_item_quantity" /></td>
  <!---------Stock Quantity-------------->
<td><input type="text" name="order_item_squantity[]" id="order_item_squantity1" data-srno="1" class="form-control input-sm order_item_squantity" readonly="" /></td>
  <!----------Previous Rate------------->
  <td><input type="text" name="order_item_prate[]" id="order_item_prate1" data-srno="1" class="form-control input-sm number_only order_item_prate" readonly="" /></td>
  <!-----------Gross Rate------------>
  <td><input type="text" name="order_item_grate[]" id="order_item_grate1" data-srno="1" class="form-control input-sm order_item_grate" readonly="" /></td>
  <!-----------Gross Amount------------>
  <td><input type="text" name="order_item_gamount[]" id="order_item_gamount1" data-srno="1" class="form-control input-sm number_only order_item_gamount" readonly="" /></td>
  <!----------------------->
 <td> </td>
            </tr>
            </table>

       <div align="right">

         <button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
       </div>
               </td>
              </tr>

      <tr>
        <td>
  <label><b>Discount%:</label>
  <input type="text" name="order_total_discount_percentage" id="order_total_discount_percentage" data-srno="1" />  </td>
        <td>
  <label><b>Discount Value:</label>
  <input type="text" name="order_total_discount_value" id="order_total_discount_value" data-srno="1" class="one" value="0" />  </td>
        <td>
  <label><b>Freight:</label>
  <input type="text" name="order_total_freight" id="order_total_freight" data-srno="1" class="one" value="0" />  </td>
  <!----------Hidden for total--------------------->
  
    <td><b>Total</b></td>
        <td><b><span id="final_total_amt"></span></b></td>
      
      </tr>


              <tr>
                <td colspan="6"></td>
              </tr>
              <tr>
          <td colspan="6" align="center">
           <!-- <input 6ype="submit" name="create_invoice" id="create_invoice" class="btn btn-info" value="Create"  />onkeypress="$('#invoice_form').submit();"  "-->
          <input  type="text" style="width: 100px;"  name="create_invoice" id="create_invoice" class="btn btn-success" value="Save " readonly />
          <input type="hidden" name="total_item" id="total_item" value="1" />
          <input type="hidden" name="order_gtotal" id="order_gtotal" data-srno="1" class="" />

          
                </td>
              </tr>
          </table>
        </div>
      </form>
      <script>
      $(document).ready(function(){
        $("#order_receiver_name").focus();
        var final_total_amt = $('#final_total_amt').text();
        var count = 1;
        
        $(document).on('click', '#add_row', function(){
          //alert(count);
          count++;
          $('#total_item').val(count);
          var html_code = '';
  html_code += '<tr id="row_id_'+count+'">';
  html_code += '<td><span id="sr_no">'+count+'</span></td>';
          
  html_code += '<td><input type="text" name="item_name[]" id="item_name'+count+'" class="form-control input-sm" /></td>';
          //--------Warehouse Name added-------------------------
  html_code += '<td><input type="text" name="order_item_whname[]" id="order_item_whname'+count+'" class="form-control input-sm" /></td>';
          //-------- Quantity------------------------------------
  html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" /></td>';
          //-------- Stock Quantity-----------------------------
  html_code +=  '<td><input type="text" name="order_item_squantity[]" id="order_item_squantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_squantity" readonly=""/></td>';
          //--------Previous Rate------------------------------
  html_code += '<td><input type="text" name="order_item_prate[]" id="order_item_prate'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_prate"  readonly/></td>';
          //---------Gross Rate-------------------------------
  html_code += '<td><input type="text" name="order_item_grate[]" id="order_item_grate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_grate" readonly=""/></td>';
          //--------Gross Amount------------------------------
  html_code += '<td><input type="text" name="order_item_gamount[]" id="order_item_gamount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_gamount" value = "0"/></td>';
          //--------Delete Button----------------------------
 // html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';

html_code += '<td><i style="color:red;font-size: 40px;" name="remove_row" id="'+count+'" class="fa fa-trash-o fa-lg remove_row"></i></td>';


 //<i style="color:red;font-size: 40px;" id="dell" class="fa fa-trash-o fa-lg"></i>
       

  html_code += '</tr>';
  //-----------Append New Row --------------------------
  $('#invoice-item-table').append(html_code);
  $("#item_name"+count).focus();
        });
        
        $(document).on('click', '.remove_row', function(){
          
          var row_id = $(this).attr("id");
          
          var total_item_amount = $('#order_item_gamount'+row_id).val();
          var final_amount = $('#final_total_amt').text();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
          $('#final_total_amt').text(result_amount);

          var order_gtotal = $('#order_gtotal').val();
          var order_gtotal1 = parseFloat(order_gtotal) - parseFloat(total_item_amount);
          $('#order_gtotal').val(order_gtotal1);

       
       if(isNaN($('#final_total_amt').text())){
               $('#final_total_amt').text(0);
      }

          $('#row_id_'+row_id).remove();
          count--;
          $('#total_item').val(count);
          
          var row_idd = row_id - 1;
          $("#item_name"+row_idd).focus();
          

          });
//---------------------Create Invoice Function------------------------------
        function cal_final_total(count)
        {
          var final_item_total = 0;
          for(j=1; j<=count; j++)
          {
            var quantity = 0;
            var grate = 0;
            var gamount = 0;
            var item_total=0;
            
            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0)
            {
              grate = $('#order_item_grate'+j).val();
              if(grate > 0)
              {
                gamount = parseFloat(quantity) * parseFloat(grate);
                //$('#order_item_gamount'+j).val(gamount);
              }
              item_total = gamount;
              final_item_total = parseFloat(final_item_total) + parseFloat(item_total);

              $('#order_item_gamount'+j).val(item_total);
                //$('#order_item_final_amount'+j).val(item_total);
              }
            }
            $('#order_gtotal').val(final_item_total);
          var dvalue = $('#order_total_discount_value').val();
          var freight = $('#order_total_freight').val();
          var final_gamount = parseFloat(final_item_total) - parseFloat(dvalue) + parseFloat(freight);
          $('#final_total_amt').text(final_gamount);
         }
/*
        $(document).on('blur', '.order_item_grate', function(){
          cal_final_total(count);
        });
*/
$(document).on('keyup', '.order_item_quantity', function(){
          cal_final_total(count);
        });
//--------------------------Temporary Total Function-------------------------------------------
 $("#order_total_discount_value").keyup(function(){
      var temp = $("#order_gtotal").val();
      var dvalue = $("#order_total_discount_value").val();
      var freight = $("#order_total_freight").val();
      //alert(freight);
      var summ = 0;
      summ = parseFloat(temp) + parseFloat(freight);
      //-------------------------------------------- 
      var sum = 0;
      sum = parseFloat(temp) -  parseFloat(dvalue) ;
      sum = parseFloat(sum) + parseFloat(freight);
      $('#final_total_amt').text(sum);
      if(isNaN($('#final_total_amt').text())){
        $('#final_total_amt').text(summ);
      }
 });

 $("#order_total_freight").keyup(function(){
      var temp = $("#order_gtotal").val();
      var dvalue = $("#order_total_discount_value").val();
      var freight = $("#order_total_freight").val();
      //alert(freight);
      var summ = 0;
      var sum = 0;
      summ = parseFloat(temp) -  parseFloat(dvalue) ;
      sum = parseFloat(summ) + parseFloat(freight);
      $('#final_total_amt').text(sum);
      
      if(isNaN($('#final_total_amt').text())){
        $("#final_total_amt").text(summ);
      } 
 });
 //--------------------Percentage--------------------------------

 $("#order_total_discount_percentage").keyup(function(){
      var temp = $("#order_gtotal").val();
      var percent = $("#order_total_discount_percentage").val();
      var percent_value = 0;
      percent_value = parseFloat(temp) *  parseFloat(percent) / 100;
      $('#order_total_discount_value').val(percent_value);

      if(isNaN($('#order_total_discount_value').val())){
        $("#order_total_discount_value").val(0);
      } 
      
 });
//-----------This code is for removing NaN value in $final_total_amt.text() if user clik the percentage or freight textbox without entering any item for sale/purchase-----------------------------------------------
 $("#order_total_discount_value").keyup(function(){
if(isNaN($('#final_total_amt').text())){
        $("#final_total_amt").text(0);
    }
});
 $("#order_total_freight").keyup(function(){
if(isNaN($('#final_total_amt').text())){
        $("#final_total_amt").text(0);
    }
}); 
//-----Alert for if user Enter Discount Value greater than Actual------
$('#order_total_discount_percentage').on('keyup',function(){
   var grand_total = $("#order_gtotal").val();
   var discount = $("#order_total_discount_value").val();
var ab = parseFloat(grand_total);
var bs = parseFloat(discount);
if(bs > ab) {
  alert("Discount Value is Greater Than Actual Amount");
  }
});
//-------------Create Invoice------Authentication-------------------------
//-------------Code for Pressing Enter Key to Submit a Form---------------
  $(document).on('keydown','#create_invoice',function(){
  //          if (e.keyCode == 13) {
          if($.trim($('#order_receiver_name').val()).length == 0)
          {
            alert("Please Enter Reciever Name Naeem");
            $('#order_receiver_name').focus();
            return false;
          }

          if($.trim($('#order_no').val()).length == 0)
          {
            alert("Please Enter Invoice Number");
            $('#order_no').focus();
            return false;
          }

          if($.trim($('#order_date').val()).length == 0)
          {
            alert("Please Select Invoice Date");
            $('#order_date').focus();
            return false;
          }

          for(var no=1; no<=count; no++) {

            if($.trim($('#item_name'+no).val()).length == 0)
            {
              alert("Please Enter Item Name");
              $('#item_name'+no).focus();
              return false;
            }

            if($.trim($('#order_item_whname'+no).val()).length == 0)
            {
              alert("Please Enter Warehouse Name");
              $('#order_item_whname'+no).focus();
              return false;
            }

            if($.trim($('#order_item_quantity'+no).val()).length == 0)
            {
              alert("Please Enter Quantity");
              $('#order_item_quantity'+no).focus();
              return false;
            }
            if($.trim($('#order_item_squantity'+no).val()).length == 0)
            {
              alert("Please Enter Stock Quantity");
              $('#order_item_squantity'+no).focus();
              return false;
            }

            if($.trim($('#order_item_grate'+no).val()).length == 0)
            {
              alert("Please Enter Gross Rate");
              $('#order_item_grate'+no).focus();
              return false;
            }

          }
            $('#invoice_form').submit();
        });

//--------------Repeating above code for Click Button to Submit Form --------------------

$(document).on('click','#create_invoice',function(){
          if($.trim($('#order_receiver_name').val()).length == 0)
          {
            alert("Please Enter Reciever Name Naeem");
            $('#order_receiver_name').focus();
            return false;
            //$('#order_receiver_name').focus();
          }

          if($.trim($('#order_no').val()).length == 0)
          {
            alert("Please Enter Invoice Number");
            $('#order_no').focus();
            return false;
          }

          if($.trim($('#order_date').val()).length == 0)
          {
            alert("Please Select Invoice Date");
            $('#order_date').focus();
            return false;
          }

          for(var no=1; no<=count; no++) {

            if($.trim($('#item_name'+no).val()).length == 0)
            {
              alert("Please Enter Item Name");
              $('#item_name'+no).focus();
              return false;
            }

            if($.trim($('#order_item_whname'+no).val()).length == 0)
            {
              alert("Please Enter Warehouse Name");
              $('#order_item_whname'+no).focus();
              return false;
            }

            if($.trim($('#order_item_quantity'+no).val()).length == 0)
            {
              alert("Please Enter Quantity");
              $('#order_item_quantity'+no).focus();
              return false;
            }
            if($.trim($('#order_item_squantity'+no).val()).length == 0)
            {
              alert("Please Enter Stock Quantity");
              $('#order_item_squantity'+no).focus();
              return false;
            }

            if($.trim($('#order_item_grate'+no).val()).length == 0)
            {
              alert("Please Enter Gross Rate");
              $('#order_item_grate'+no).focus();
              return false;
            }

          }
            
            $('#invoice_form').submit();
        });  
});
//});
   </script>


      <?php
      }
 //----------------------Update code----------------------------
      
      elseif(isset($_GET["update"]) && isset($_GET["id"]))
      {
        $statement = $connect->prepare("
          SELECT * FROM tbl_order 
            WHERE order_id = :order_id
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':order_id'       =>  $_GET["id"]
            )
          );
        $result = $statement->fetchAll();
        //$tempvalue = $row[""]

        foreach($result as $row)
        {
        ?>
        <script>
        $(document).ready(function(){
    $('#order_no').val("<?php echo $row["order_no"]; ?>");
    $('#order_date').val("<?php echo $row["order_date"]; ?>");
    $('#order_receiver_name').val("<?php echo $row["order_receiver_name"]; ?>");
    $('#order_receiver_remarks').val("<?php echo $row["order_receiver_remarks"]; ?>");
    $('#order_total_discount_percentage').val("<?php echo $row["order_total_discount_percentage"]; ?>");
    $('#order_total_discount_value').val("<?php echo $row["order_total_discount_value"]; ?>");
    $('#order_total_freight').val("<?php echo $row["order_total_freight"]; ?>");
    $('#order_gtotal').val("<?php echo $row["order_total_before_discount_freight"]; ?>");
        });
        </script>
        <form method="post" id="invoice_form">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td colspan="6" align="center"><h2 style="margin-top:10.5px">Edit Invoice</h2></td>
            </tr>
            <tr>
                <td colspan="6">
                  <div class="row">
                    <div class="col-md-8">
                      To,<br />
                        <b>RECEIVER (BILL TO)</b><br />
                        <input type="text" name="order_receiver_name" id="order_receiver_name" class="form-control input-sm" placeholder="Enter Receiver Name" />
                        <b>Remarks</b><br />
                        <input type="text" name="order_receiver_remarks" id="order_receiver_remarks" class="form-control" placeholder="Enter Billing Address">
                    </div>
                    <div class="col-md-4">
                      <br />
                      <b>Invoice No.</b><br />
                      <input type="text" name="order_no" id="order_no" class="form-control input-sm" placeholder="Enter Invoice No." readonly="" />
                      <input type="text" data-inputmask="'alias': 'date'" name="order_date" id="order_date" value="<?php echo date('d/m/Y'); ?>" class="form-control input-sm" />
                      <b>Opening Balance</b><br />
                        <input type="text" name="opbal" id="opbal" class="form-control input-sm" placeholder="Opening Balance" readonly="" />
                        
                    </div>
                  </div>
                  <br />
                  <table id="invoice-item-table" class="table table-bordered">
                    <tr>

                      <th width="2%">Sr#</th>
                      <th width="20%">Item Name</th>
                      <th width="20%">Warehouse Name</th>
                      <th width="5%">Quantity</th>
                      <th width="5%">Stock Quantity</th>
                      <th width="5%">Previous Rate</th>
                      <th width="7%">Gross Rate</th>
                      <th width="8%">Gross Amount</th>
                      <th width="3%">+/-</th>
                    </tr>
                    
                    <?php
                    $statement = $connect->prepare("
                      SELECT * FROM tbl_order_item 
                      WHERE order_id = :order_id
                    ");
                    $statement->execute(
                      array(
                        ':order_id'       =>  $_GET["id"]
                      )
                    );
                    $item_result = $statement->fetchAll();
                    $m = 0;
                    foreach($item_result as $sub_row)
                    {
                      $m = $m + 1;
                    ?>
                    <tr>
                  <!----  <tr id="rload">    -->
  <td><span id="sr_no"><?php echo $m; ?></span></td>
  <!----------Item Name------------->
  <td><input type="text" name="item_name[]" id="item_name<?php echo $m; ?>" class="form-control input-sm" value="<?php echo $sub_row["item_name"]; ?>" /></td>
  <!----------Warehouse Name------------->
  <td><input type="text" name="order_item_whname[]" id="order_item_whname<?php echo $m; ?>" class="form-control input-sm" value="<?php echo $sub_row["order_item_whname"]; ?>" /></td>
  <!----------Quantity------------------->
  <td><input type="text" name="order_item_quantity[]" id="order_item_quantity<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm order_item_quantity" value = "<?php echo $sub_row["order_item_quantity"]; ?>"/></td>
  <!----------Stock Quantity------------------->
  <td><input type="text" name="order_item_squantity[]" id="order_item_squantity<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_squantity" value="<?php echo $sub_row["order_item_squantity"]; ?>" readonly=""/></td>
  <!----------Previous Rate------------------->
  <td><input type="text" name="order_item_prate[]" id="order_item_prate<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm order_item_prate" value="<?php echo $sub_row["order_item_prate"];?>" readonly/></td>
  <!----------Gross Rate------------------->
  <td><input type="text" name="order_item_grate[]" id="order_item_grate<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_grate" value="<?php echo $sub_row["order_item_grate"]; ?>" readonly=""/></td>
  <!----------Gross Amount------------------->
  <td><input type="text" name="order_item_gamount[]" id="order_item_gamount<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm order_item_gamount" value="<?php echo $sub_row["order_item_gamount"];?>" readonly/></td>

                      <!--------------------Naeem Ahmed------------------->
  <td>
  <a href="#" id="" class="deleted" data-srno="<?php echo $m; ?>" data-id="<?php echo $sub_row["order_item_id"]; ?>" > <!--<span class="glyphicon glyphicon-remove">Delete</span> -->
    <i style="color:red;font-size: 40px;" class="fa fa-trash-o fa-lg"></i> </a>

  <span type="text" name="deleting[]" id="deleting" data-id="<?php echo $sub_row["order_item_id"]; ?>" value ="<?php echo $sub_row["order_item_id"]; ?>" ></span>
  
  </td>       
     </tr>
         <?php
               }
                ?>
   </table>

<div align="right">
       <button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button>
       </div>
           </td>
              </tr>

  <tr>
    <td>
<label><b>Discount%:</label>
  <input type="text" name="order_total_discount_percentage" id="order_total_discount_percentage" data-srno="1" />  </td>
        <td>
  <label><b>Discount Value:</label>
  <input type="text" name="order_total_discount_value" id="order_total_discount_value" data-srno="1" class="one" value="0" />  </td>
        <td>
  <label><b>Freight:</label>
  <input type="text" name="order_total_freight" id="order_total_freight" data-srno="1" class="one" value="0" />  </td>
  <!----------Hidden for total---------------------
  <td>
  <label><b>Hidden</label>
  <input type="text" name="order_gtotal" id="order_gtotal" data-srno="1" class="" />  </td>
--->

    <td><b>Total</b></td>
    <td><b><span id="final_total_amt"><?php echo $row["order_total_after_discount_freight"]; ?></span></b>
    </td>
  </tr>
  <tr>
                <td colspan="6"></td>
              </tr>
              <tr>
         <td colspan="6" align="center">
         <input type="text" style="width: 100px;" name="update_invoice" id="create_invoice" class="btn btn-success" value="Update" readonly="" />
          <input type="hidden" name="total_item" id="total_item" value="<?php echo $m; ?>" />
         <input type="hidden" name="order_id" id="order_id" value="<?php echo $row["order_id"]; ?>" />
          <input type="hidden" name="order_gtotal" id="order_gtotal" data-srno="1" class="" />        
                    </td>
              </tr>
          </table>
        </div>
      </form>
<!---------------------------------------------------------------------->      
      <script>
      $(document).ready(function(){
        $("#order_receiver_name").focus();
        var final_total_amt = $('#final_total_amt').text();
        var count = "<?php echo $m; ?>";
        
        $(document).on('click', '#add_row', function(){
          //alert(count);
          count++;
          $('#total_item').val(count);
          var html_code = '';
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';
  //----------Item Name-------------------        
  html_code += '<td><input type="text" name="item_name[]" id="item_name'+count+'" class="form-control input-sm" /></td>';
  //----------Warehouse Name-------------------
  html_code += '<td><input type="text" name="order_item_whname[]" id="order_item_whname'+count+'" class="form-control input-sm" /></td>';
  //----------Quantity-------------------
  html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" /></td>';
  //----------Stock Quanity-------------------
  html_code += '<td><input type="text" name="order_item_squantity[]" id="order_item_squantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_squantity" readonly=""/></td>';
  //----------Previous Rate-------------------        
 html_code += '<td><input type="text" name="order_item_prate[]" id="order_item_prate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_prate" readonly/></td>';
  //----------Gross Rate-------------------
  html_code += '<td><input type="text" name="order_item_grate[]" id="order_item_grate'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_grate" readonly=""/></td>';
  //----------Gross Amount-------------------
  html_code += '<td><input type="text" name="order_item_gamount[]" id="order_item_gamount'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_gamount" value = "0" readonly=""/></td>';
  //----------Delete Button-------------------
  //html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';

html_code += '<td><i style="color:red;font-size: 40px;" name="remove_row" id="'+count+'" class="fa fa-trash-o fa-lg remove_row"></i></td>';




  html_code += '</tr>';
          $('#invoice-item-table').append(html_code);
          $("#item_name"+count).focus();
        });

        $(document).on('click', '.remove_row', function(){
          var row_id = $(this).attr("id");
          var total_item_amount = $('#order_item_gamount'+row_id).val();
          var final_amount = $('#final_total_amt').text();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
          
          var order_gtotal = $('#order_gtotal').val();
          var order_gtotal1 = parseFloat(order_gtotal) - parseFloat(total_item_amount);
          $('#order_gtotal').val(order_gtotal1);

          $('#final_total_amt').text(result_amount);
          $('#row_id_'+row_id).remove();
          count--;
          $('#total_item').val(count);

          var row_idd = row_id - 1;
          $("#item_name"+row_idd).focus();
       });

// This code is added by Naeem to Refresh the Final Total Amount while deleting any record
        $(document).on('click', '.deleted', function(){
          var row_id = $(this).attr("data-srno");
//var row_id = $(this).attr("id");
          var total_item_amount = $('#order_item_gamount'+row_id).val();
          var final_amount = $('#final_total_amt').text();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);

          var order_gtotal = $('#order_gtotal').val();
          var order_gtotal1 = parseFloat(order_gtotal) - parseFloat(total_item_amount);
          $('#order_gtotal').val(order_gtotal1);

          $('#final_total_amt').text(result_amount);
          $('#row_id_'+row_id).remove();
          count--;
          $('#total_item').val(count);

          var row_idd = row_id - 1;
          $("#item_name"+row_idd).focus();
  
        });
//------------------------------Edit Invoice Function -----------------------------------
        function cal_final_total(count)
        {
          var final_item_total = 0;
          for(j=1; j<=count; j++)
          {
            var quantity = 0;
            var grate = 0;
            var gamount = 0;
            var item_total=0;

            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0)
            {
              grate = $('#order_item_grate'+j).val();
              if(grate > 0)
              {
                gamount = parseFloat(quantity) * parseFloat(grate);
              }
               item_total = gamount;
              final_item_total = parseFloat(final_item_total) + parseFloat(item_total);

              $('#order_item_gamount'+j).val(item_total);
            }
          }
          $('#order_gtotal').val(final_item_total);
          var dvalue = $('#order_total_discount_value').val();
          var freight = $('#order_total_freight').val();
          var final_gamount = parseFloat(final_item_total) - parseFloat(dvalue) + parseFloat(freight);
          $('#final_total_amt').text(final_gamount);
        }
/*
        $(document).on('blur', '.order_item_grate', function(){
          cal_final_total(count);
        });
*/
        $(document).on('keyup', '.order_item_quantity', function(){
          cal_final_total(count);
        });
//--------------------------Temporary Total Function-------------------------------------------
 $("#order_total_discount_value").keyup(function(){
      var temp = $("#order_gtotal").val();
      var dvalue = $("#order_total_discount_value").val();
      var freight = $("#order_total_freight").val();
      //alert(freight);
      var summ = 0;
      summ = parseFloat(temp) + parseFloat(freight);
      //-------------------------------------------- 
      var sum = 0;
      sum = parseFloat(temp) -  parseFloat(dvalue) ;
      sum = parseFloat(sum) + parseFloat(freight);
      $('#final_total_amt').text(sum);
      if(isNaN($('#final_total_amt').text())){
        $('#final_total_amt').text(summ);
      }
 });

 $("#order_total_freight").keyup(function(){
      var temp = $("#order_gtotal").val();
      var dvalue = $("#order_total_discount_value").val();
      var freight = $("#order_total_freight").val();
      //alert(freight);
      var summ = 0;
      var sum = 0;
      summ = parseFloat(temp) -  parseFloat(dvalue) ;
      sum = parseFloat(summ) + parseFloat(freight);
      $('#final_total_amt').text(sum);
      
      if(isNaN($('#final_total_amt').text())){
        $("#final_total_amt").text(summ);
      } 
 });
//--------------------------------------------------------------------------
//--------------------Percentage--------------------------------

 $("#order_total_discount_percentage").keyup(function(){
      var temp = $("#order_gtotal").val();
      var percent = $("#order_total_discount_percentage").val();
      var percent_value = 0;
      percent_value = parseFloat(temp) *  parseFloat(percent) / 100;
      $('#order_total_discount_value').val(percent_value);

      if(isNaN($('#order_total_discount_value').val())){
        $("#order_total_discount_value").val(0);
      } 
      
 });
//-----Alert for if user Enter Discount Value greater than Actual------
$('#order_total_discount_percentage').on('keyup',function(){
   var grand_total = $("#order_gtotal").val();
   var discount = $("#order_total_discount_value").val();
var ab = parseFloat(grand_total);
var bs = parseFloat(discount);
if(bs > ab) {
  alert("Discount Value is Greater Than Actual Amount");
  }
});
//----------Authentication code for Edit Invoice-----------
        $(document).on('keypress','#create_invoice',function(){
          if($.trim($('#order_receiver_name').val()).length == 0)
          {
            alert("Please Enter Reciever Name ");
            $('#order_receiver_name').focus();
            return false; 
          }

          if($.trim($('#order_no').val()).length == 0)
          {
            alert("Please Enter Invoice Number");
            $('#order_no').focus();
            return false;
          }

          if($.trim($('#order_date').val()).length == 0)
          {
            alert("Please Select Invoice Date");
            $('#order_date').focus();
            return false;
          }

          for(var no=1; no<=count; no++)
          {
            if($.trim($('#item_name'+no).val()).length == 0)
            {
              alert("Please Enter Item Name");
              $('#item_name'+no).focus();
              return false;
            }
            if($.trim($('#order_item_whname'+no).val()).length == 0)
            {
              alert("Please Enter Warehouse Name");
              $('#order_item_whname'+no).focus();
              return false;
            }

            if($.trim($('#order_item_quantity'+no).val()).length == 0)
            {
              alert("Please Enter Quantity");
              $('#order_item_quantity'+no).focus();
              return false;
            }

            if($.trim($('#order_item_grate'+no).val()).length == 0)
            {
              alert("Please Enter Gross Rate");
              $('#order_item_grate'+no).focus();
              return false;
            }
            

          }

          $('#invoice_form').submit();

        });

   //   });
//-----------------Repeating code for Edit invoice on Click Event-------------------
$(document).on('click','#create_invoice',function(){

          if($.trim($('#order_receiver_name').val()).length == 0)
          {
            alert("Please Enter Reciever Name ");
            $('#order_receiver_name').focus();
            return false; 
          }

          if($.trim($('#order_no').val()).length == 0)
          {
            alert("Please Enter Invoice Number");
            $('#order_no').focus();
            return false;
          }

          if($.trim($('#order_date').val()).length == 0)
          {
            alert("Please Select Invoice Date");
            $('#order_date').focus();
            return false;
          }

          for(var no=1; no<=count; no++)
          {
            if($.trim($('#item_name'+no).val()).length == 0)
            {
              alert("Please Enter Item Name");
              $('#item_name'+no).focus();
              return false;
            }
            if($.trim($('#order_item_whname'+no).val()).length == 0)
            {
              alert("Please Enter Warehouse Name");
              $('#order_item_whname'+no).focus();
              return false;
            }

            if($.trim($('#order_item_quantity'+no).val()).length == 0)
            {
              alert("Please Enter Quantity");
              $('#order_item_quantity'+no).focus();
              return false;
            }

            if($.trim($('#order_item_grate'+no).val()).length == 0)
            {
              alert("Please Enter Gross Rate");
              $('#order_item_grate'+no).focus();
              return false;
            }
            

          }

          $('#invoice_form').submit();

        });
   });
      </script>
        <?php 
        }
      }
      else
      {
      ?>
<!----------First Page of Invoice System------------------->
      <h3 align="center"><B>Sales Invoice:</B></h3>
      <br />
      <div align="right">
        <a href="sales.php?add=1" class="btn btn-info btn-xs" id="new_create">Create</a>
      </div>
      <br />
      <table id="data-table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Invoice No.</th>
            <th>Invoice Date</th>
            <th>Receiver Name</th>
            <th>Invoice Total</th>
            <th>PDF</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <?php
        if($total_rows > 0)
        {
          foreach($all_result as $row)
          {
            echo '
              <tr>
                <td>'.$row["order_no"].'</td>
                <td>'.$row["order_date"].'</td>
                <td>'.$row["order_receiver_name"].'</td>
                <td>'.$row["order_total_after_discount_freight"].'</td>
                <td><a href="Transaction_sales/print_sales.php?pdf=1&id='.$row["order_id"].'">
                <i style="color:#7d42f4;font-size: 30px;" class="fa fa-print fa-lg"></i>    
                </a></td>
                <td><a href="sales.php?update=1&id='.$row["order_id"].'">
                <i style="color:#00cc00;font-size: 30px;" class="fa fa-edit fa-lg"></i>    
                </a></td>
                <td><a href="#" id="'.$row["order_id"].'" class="delete">
                <i style="color:Red;font-size: 30px;" class="fa fa-trash-o fa-lg"></i>    
                </a></td>
              </tr>
            ';
          }
          //
          //
          //
        }
        ?>
      </table>
      <?php
      }
      ?>
    </div>
    <br>
    
  </body>
</html>
<!-------------------------First Page Closed-------------------------->
<script type="text/javascript">
  $(document).ready(function(){
    $("#new_create").focus();
    var table = $('#data-table').DataTable({
          "order":[],
          "columnDefs":[
          {
            "targets":[4, 5, 6],
            "orderable":false,
          },
        ],
        "pageLength": 25
        });
    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      if(confirm("Are you sure you want to remove this?"))
      {
        window.location.href="sales.php?delete=1&id="+id;
      }
      else
      {
        return false;
      }
    });
   
  });

</script>
<!--------------------------------------------------------------------->
<script>
$(document).ready(function(){
$('.number_only').keypress(function(e){
return isNumbers(e, this);      
});
function isNumbers(evt, element) 
{
var charCode = (evt.which) ? evt.which : event.keyCode;
if (
          // “.” CHECK DOT, AND ONLY ONE.
(charCode != 46 || $(element).val().indexOf('.') != -1) &&  //46 code of Delete

(charCode < 48 || charCode > 57))  // 0-9  .... 48 is code of 0 and 57 is code of 9
return false;
return true;
}
});
</script>
<!--------------------------------------------------------------------->
<!-----------D------------------------>
<script>
$(document).ready(function(){
$(document).on("click",".deleted",function(){
    var del=$(this);
    var id = $(this).attr("data-id");

       $.ajax({
      url:  "Transaction_sales/delete.php",
      type:  "post",
      data: {id:id},
      success:function() {
        del.closest("tr").hide();
      }
    });
  });
});
</script>
<!------This code is of inputmask for Date  ------>
<script>
  $("#order_date").inputmask();
</script>
<!------This code is For Enter Index  ---->
<script type="text/javascript">
 $(document).ready(function(){
//e.preventDefault();
inputs = $("form :input");
 $(inputs).keypress(function(e){
 if(e.keyCode == 13){
 //   e.preventDefault();
   inputs[inputs.index(this)+1].focus();
    }
});
});
 //});
</script>
<!------This code is For Enter Index "Item_names" ---->
<script>
  $(document).ready(function(){
  var i = 1;
  do{

  $(document).on('focus','#item_name'+i,function(){
inputs = $(":input");
$(inputs).keypress(function(e){
    if (e.keyCode == 13){
      inputs[inputs.index(this)+1].focus();
    }
});
    });
        i++;
              }while(i<500);
});
</script>

<!------This code is for to move Cursor to Discount% input Box by Pressing Shift Key------>
<script>
  $(document).keydown(function (e) {
    if (e.keyCode == 35 || e.keyCode == 36) {
        //alert(e.which + " or Shift was pressed");
      $("#order_total_discount_percentage").focus();  
    }
});
</script>       
<!------- This is a click event for autocomplete Customer_name--------->
<script >
  $(function() {
     $("#order_receiver_name").autocomplete({
        source: "Transaction_sales/autocomplete_cusname.php",
        minLength: 0,
        select: function (event, ui){}
          });                
    });
 </script>

<!------- This is a click event for autocomplete item_name--------->
<script >
//$(document).on('click',"#add_row",function(){
  $(document).add("#add_row").bind('keypress click',function(){
  var auto = 1;
  $(function() {
  do{  
     $("#item_name"+auto).autocomplete({
        source: "Transaction_sales/autocomplete_itemname.php",
        minLength: 0,
        select: function (event, ui){}
          });                
        auto++;
      }while(auto<500);
    });
  }); 
</script>
<!------- This is a click event for autocomplete Warehouse_name--------->
<script >
//$(document).on('click',"#add_row",function(){
  $(document).add("#add_row").bind('keypress click',function(){
  var auto = 1;
  $(function() {
  do{  
     $("#order_item_whname"+auto).autocomplete({
        source: "Transaction_sales/autocomplete_whname.php",
        minLength: 0,
        select: function (event, ui){}
          });                
        auto++;
      }while(auto<500);
    });
  }); 
</script>
<!------- This is a keypress event for autocomplete item_name---------
<script >
$(document).on('keypress',function(){
  var auto = 1;
  $(function() {
  do{  
     $("#item_name"+auto).autocomplete({
        source: "autocomplete_itemname.php",
        minLength: 0,
        select: function (event, ui){}
    });                
auto++;
}while(auto<500);
});
}); 
</script>
--->
<!---------------Code for updating Stock Quantity dynamically------------->
<script>
$(document).on('keyup',function(){
  $(function() {
// var dummy = [1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41]; 
//-------the above code also works fine , but in below code i used the for loop to push 500 numbres in dummy array-----------------
  var dummy = [];
  for (var i = 0; i < 500; i++) {
    dummy.push(i);
    }
 //----------------------------------------   
  $.each(dummy, function(i, v) { // New scope for i and v
     $('#item_name' + i).keyup(function() {
                  //alert(i);
      var itemcode = $(this).val();
        $.ajax({
          type: 'POST',
          url: 'Transaction_sales/sqty_dynamics.php',
          data:{item_name:itemcode},
           success:function(data){
              $("#order_item_squantity"+ i).val(data);
            }
        });
      });
    });
  }); 
});
</script>
<!---------------Code for updating Gross Rate dynamically------------->
<script>
$(document).on('keyup',function(){
  $(function() {
//----- push numbers in dummy array----------
  var dummy = [];
  for (var i = 0; i < 500; i++) {
    dummy.push(i);
    }
 //----------------------------------------   
  $.each(dummy, function(i, v) { // New scope for i and v
     $('#item_name' + i).keyup(function() {
                  //alert(i);
      var itemcode = $(this).val();
        $.ajax({
          type: 'POST',
          url: 'Transaction_sales/grate_dynamics.php',
          data:{item_name:itemcode},
           success:function(data){
              $("#order_item_grate"+ i).val(data);
            }
        });
      });
    });
  }); 
});
</script>
<!---------------Code for updating Previous Rate dynamically------------->
<script>
$(document).on('keyup',function(){
  $(function() {
//----- push numbers in dummy array----------
  var dummy = [];
  for (var i = 0; i < 500; i++) {
    dummy.push(i);
    }
 //----------------------------------------   
  $.each(dummy, function(i, v) { // New scope for i and v
     $('#item_name' + i).keyup(function() {
                  //alert(i);
      var itemcode = $(this).val();
        $.ajax({
          type: 'POST',
          url: 'Transaction_sales/prate_dynamics.php',
          data:{item_name:itemcode},
           success:function(data){
              $("#order_item_prate"+ i).val(data);
            }
        });
      });
    });
  }); 
});
</script>
<?php include('footer.php'); ?>