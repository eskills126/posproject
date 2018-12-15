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
    SELECT * FROM tbl_order_purchase 
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
  
    $order_total_qty = 0;
    $order_total_before_discount = 0;
    $order_total_discount_value = 0;
    $order_total_after_discount = 0;
    
    $statement = $connect->prepare("
      INSERT INTO tbl_order_purchase 
         (order_no, order_date, order_receiver_name, order_receiver_remarks, order_total_qty,order_total_before_discount, order_total_discount_value, order_total_after_discount,order_datetime)
  VALUES (:order_no, :order_date, :order_receiver_name, :order_receiver_remarks, :order_total_qty, :order_total_before_discount, :order_total_discount_value, :order_total_after_discount, :order_datetime)
    ");
    $statement->execute(
      array(
      ':order_no'                         =>  trim($_POST["order_no"]),
      ':order_date'                       =>  trim($_POST["order_date"]),
      ':order_receiver_name'              =>  trim($result), 
      ':order_receiver_remarks'           =>  trim($_POST["order_receiver_remarks"]),
      ':order_total_qty'                  =>  $order_total_qty,
      ':order_total_before_discount'      =>  $order_total_before_discount,
      ':order_total_discount_value'       =>  $order_total_discount_value,
      ':order_total_after_discount'       =>  $order_total_after_discount,
      ':order_datetime'                   =>  date("Y-m-d")
      )
    );

      $statement = $connect->query("SELECT LAST_INSERT_ID()");
      $order_id = $statement->fetchColumn();

      for($count=0; $count<$_POST["total_item"]; $count++)
      {
$order_total_before_discount = $order_total_before_discount + floatval(trim($_POST["order_item_gamount"][$count]));
//------------------------------------------------------------------------------------------
$item_name_value=$_POST["item_name"];
$item_name =preg_replace('/.*-/', '', $item_name_value);

$whname_value=$_POST["order_item_whname"];
$wh_name =preg_replace('/.*-/', '', $whname_value);


        $statement = $connect->prepare("
          INSERT INTO tbl_order_item_purchase 
          (order_id, item_name, order_item_whname, order_item_quantity, order_item_squantity, order_item_prate, order_item_grate, order_item_gamount,order_item_disc_percent,order_item_disc_value,order_item_disc_rate,order_item_amount)
          VALUES (:order_id, :item_name, :order_item_whname, :order_item_quantity, :order_item_squantity, :order_item_prate, :order_item_grate, :order_item_gamount, :order_item_disc_percent, :order_item_disc_value, :order_item_disc_rate, :order_item_amount)
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
            ':order_item_gamount'       =>  trim($_POST["order_item_gamount"][$count]),
// ---------------------------------
            ':order_item_disc_percent'  =>  trim($_POST["order_item_disc_percent"][$count]),
            ':order_item_disc_value'    =>  trim($_POST["order_item_disc_value"][$count]),
            ':order_item_disc_rate'     =>  trim($_POST["order_item_disc_rate"][$count]),
            ':order_item_amount'        =>  trim($_POST["order_item_amount"][$count])


          )
        );
      }
  
  $order_total_qty = floatval(trim($_POST["order_total_qty"]));
  $order_total_discount_value = floatval(trim($_POST["order_total_tdisc"]));
  $order_total_after_discount = floatval(trim($_POST["order_total_bamount"]));

      $statement = $connect->prepare("
        UPDATE tbl_order_purchase 
        SET order_total_qty = :order_total_qty, 
        order_total_before_discount = :order_total_before_discount, 
        order_total_discount_value = :order_total_discount_value, 
        order_total_after_discount = :order_total_after_discount
        WHERE order_id = :order_id 
      ");
      $statement->execute(
        array(
          ':order_total_qty'                 =>  $order_total_qty,
          ':order_total_before_discount'     =>  $order_total_before_discount,
          ':order_total_discount_value'      =>  $order_total_discount_value,
          ':order_total_after_discount'      =>  $order_total_after_discount,
          ':order_id'                        =>  $order_id
        )
      );
      header("location:purchases.php");
      //------ This code is to remove the following error-----------
//---Cannot modify header information - headers already sent by... ----      
      ob_end_flush();
  }



//--------------------Updating / Edit Invoice-----------------------------
  if(isset($_POST["update_invoice"]))
  {
      $order_total_qty = 0;
      $order_total_tgamout = 0;
      $order_total_tdisc = 0;
      $order_total_bamount = 0;
      //$order_total_tax = 0;
      //$order_total_after_discount = 0;
      
      $order_id = $_POST["order_id"];
            
      $statement = $connect->prepare("
                DELETE FROM tbl_order_item_purchase WHERE order_id = :order_id
            ");
            $statement->execute(
                array(
                    ':order_id'       =>      $order_id
                )
            );
      
      for($count=0; $count<$_POST["total_item"]; $count++)
      {
  $order_total_tgamout =$order_total_tgamout + floatval(trim($_POST["order_item_amount"][$count]));
 //----------------------------------------------------- 
$item_name_value = $_POST["item_name"];
$item_name = preg_replace('/.*-/', '', $item_name_value);

$whname_value = $_POST["order_item_whname"];
$wh_name = preg_replace('/.*-/', '', $whname_value);


        $statement = $connect->prepare("
   INSERT INTO tbl_order_item_purchase 
   (order_id, item_name, order_item_whname, order_item_quantity, order_item_squantity,order_item_prate, order_item_grate, order_item_gamount,order_item_disc_percent,order_item_disc_value,order_item_disc_rate,order_item_amount) 
   VALUES (:order_id, :item_name, :order_item_whname, :order_item_quantity, :order_item_squantity, :order_item_prate, :order_item_grate, :order_item_gamount, :order_item_disc_percent , :order_item_disc_value , :order_item_disc_rate , :order_item_amount)
        ");
        $statement->execute(
          array(
            ':order_id'                 =>  $order_id,
            ':item_name'                =>  trim($item_name[$count]),
            ':order_item_whname'        =>  trim($wh_name[$count]),
            ':order_item_quantity'      =>  trim($_POST["order_item_quantity"][$count]),
            ':order_item_squantity'     =>  trim($_POST["order_item_squantity"][$count]),
            ':order_item_prate'         =>  trim($_POST["order_item_prate"][$count]),
            ':order_item_grate'         =>  trim($_POST["order_item_grate"][$count]),
            ':order_item_gamount'       =>  trim($_POST["order_item_gamount"][$count]),

            ':order_item_disc_percent'  =>  trim($_POST["order_item_disc_percent"][$count]),
            ':order_item_disc_value'    =>  trim($_POST["order_item_disc_value"][$count]),
            ':order_item_disc_rate'     =>  trim($_POST["order_item_disc_rate"][$count]),
            ':order_item_amount'        =>  trim($_POST["order_item_amount"][$count])

            )
        );
        $result = $statement->fetchAll();
      }
      //$order_total_tax = $order_total_tax1 + $order_total_tax2 + $order_total_tax3;
  $order_total_qty = floatval(trim($_POST["order_total_qty"]));
  $order_total_tgamout = floatval(trim($_POST["order_total_tgamout"]));
  $order_total_tdisc = floatval(trim($_POST["order_total_tdisc"])); 
  $order_total_bamount = floatval(trim($_POST["order_total_bamount"])); 

  //$order_total_after_discount = $order_total_before_discount_freight - $order_total_discount_value + $order_total_freight;
//---------------------------------------------------------------
$edata=$_POST["order_receiver_name"];
$r_name =preg_replace('/.*-/', '', $edata);


      $statement = $connect->prepare("
        UPDATE tbl_order_purchase 
        SET order_no = :order_no, 
        order_date = :order_date, 
        order_receiver_name = :order_receiver_name, 
        order_receiver_remarks = :order_receiver_remarks, 
        order_total_qty = :order_total_qty, 
        order_total_before_discount = :order_total_before_discount, 
        order_total_discount_value = :order_total_discount_value, 
        order_total_after_discount = :order_total_after_discount
        WHERE order_id = :order_id 
      ");
      
      $statement->execute(
        array(
    ':order_no'                             =>  trim($_POST["order_no"]),
    ':order_date'                           =>  trim($_POST["order_date"]),
    ':order_receiver_name'                  =>  trim($r_name),
    ':order_receiver_remarks'               =>  trim($_POST["order_receiver_remarks"]),
    ':order_total_qty'                      =>  $order_total_qty,
    ':order_total_before_discount'          =>  $order_total_tgamout,
    ':order_total_discount_value'           =>  $order_total_tdisc,
    ':order_total_after_discount'           =>  $order_total_bamount,
    ':order_id'                             =>  $order_id
        )
      );
      
      $result = $statement->fetchAll();
            
      header("location:purchases.php");
//------ This code is to remove the following error-----------
//---Cannot modify header information - headers already sent by... ----      
      ob_end_flush();
  }

//-----------------Delete Code --------------------------
  if(isset($_GET["delete"]) && isset($_GET["id"]))
  {
    $statement = $connect->prepare("DELETE FROM tbl_order_purchase WHERE order_id = :id");
    $statement->execute(
      array(
        ':id'       =>      $_GET["id"]
      )
    );
    $statement = $connect->prepare(
      "DELETE FROM tbl_order_item_purchase WHERE order_id = :id");
    $statement->execute(
      array(
        ':id'       =>      $_GET["id"]
      )
    );
    header("location:purchases.php");
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
      <form method="post" id="invoice_form" >
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td colspan="6" align="center"><h2 style="margin-top:10.5px">Create Invoice</h2></td>
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
      $connect = "SELECT * FROM tbl_order_purchase where order_no=(SELECT max(order_no) FROM tbl_order_purchase) GROUP by order_no";
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
                        <input type="text" name="opbal" id="opbal" class="form-control input-sm" placeholder="Opening Balance" readonly="" />
                        
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
                      <th width="23%">Item Name</th>
                      <th width="15%">Warehouse Name</th>
                      <th width="5%">Quantity</th>
                      <th width="5%">Stock Quantity</th>
                      <th width="5%">Previous Rate</th>
                      <th width="7%">Gross Rate</th>
                      <th width="8%">Gross Amount</th>

                      <th width="8%">Disc. %</th>
                      <th width="8%">Disc. Value</th>
                      <th width="8%">Disc. Rate</th>
                      <th width="8%">Amount</th>

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
  <td><input type="text" name="order_item_grate[]" id="order_item_grate1" data-srno="1" class="form-control input-sm order_item_grate"  /></td>
  <!-----------Gross Amount------------>
  <td><input type="text" name="order_item_gamount[]" id="order_item_gamount1" data-srno="1" class="form-control input-sm number_only order_item_gamount" readonly="" /></td>
  <!------------------------------------------------------------------------------->
  <!-----------Disc %------------>
  <td><input type="text" name="order_item_disc_percent[]" id="order_item_disc_percent1" data-srno="1" class="form-control input-sm number_only order_item_disc_percent" /></td>
  <!-----------Disc Value------------>
  <td><input type="text" name="order_item_disc_value[]" id="order_item_disc_value1" data-srno="1" class="form-control input-sm number_only order_item_disc_value" readonly="" /></td>
  <!-----------Disc Rate------------>
  <td><input type="text" name="order_item_disc_rate[]" id="order_item_disc_rate1" data-srno="1" class="form-control input-sm number_only order_item_disc_rate" readonly="" /></td>
  <!-----------Amount------------>
  <td><input type="text" name="order_item_amount[]" id="order_item_amount1" data-srno="1" class="form-control input-sm number_only order_item_amount" readonly="" /></td>
  <!----------------------->
 <td> </td>
            </tr>
            </table>

       <div align="right">

         <button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button>
       </div>
               </td>
              </tr>

      <tr>
        <td>
  <label><b>Total Qty:</label>
  <input type="text" name="order_total_qty" id="order_total_qty" data-srno="1" />
      </td>
        <td>
  <label><b>Total G.Amount:</label>
  <input type="text" name="order_total_tgamout" id="order_total_tgamout" data-srno="1" class="one"  />  </td>
  <td>
  <label><b>Total Discount:</label>
  <input type="text" name="order_total_tdisc" id="order_total_tdisc" data-srno="1" class="one"  />  </td>
  <td>
  <label><b>Bill Amount:</label>
  <input type="text" name="order_total_bamount" id="order_total_bamount" data-srno="1" class="one" />  </td>
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
        var row_count = 1;
var a = [];
var ab = [];
//-----------------------------------------------------------------------
        $(document).on('click', '#add_row', function(){
          row_count++;
          count++;
for(var i = count; i <= count; i++){
a.push(count);
}
          $('#total_item').val(row_count);
          var html_code = '';
  html_code += '<tr id="row_id_'+count+'">';
  html_code += '<td><span id="sr_no">'+count+'</span></td>';
          
  html_code += '<td><input type="text" name="item_name[]" id="item_name'+count+'" class="form-control input-sm" /></td>';
          //--------Warehouse Name added-------------------------
  html_code += '<td><input type="text" name="order_item_whname[]" id="order_item_whname'+count+'" class="form-control input-sm" /></td>';
          //-------- Quantity------------------------------------
  html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" value=""/></td>';
          //-------- Stock Quantity-----------------------------
  html_code +=  '<td><input type="text" name="order_item_squantity[]" id="order_item_squantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_squantity" readonly=""/></td>';
          //--------Previous Rate------------------------------
  html_code += '<td><input type="text" name="order_item_prate[]" id="order_item_prate'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_prate"  readonly/></td>';
          //---------Gross Rate-------------------------------
  html_code += '<td><input type="text" name="order_item_grate[]" id="order_item_grate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_grate" /></td>';
          //--------Gross Amount------------------------------
  html_code += '<td><input type="text" name="order_item_gamount[]" id="order_item_gamount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_gamount" value = "0"/></td>';
 //-----------------------------------------------------------------------


//<!-----------Disc %------------>
  html_code += '<td><input type="text" name="order_item_disc_percent[]" id="order_item_disc_percent'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_disc_percent" /></td>';
  //<!-----------Disc Value------------>
  html_code += '<td><input type="text" name="order_item_disc_value[]" id="order_item_disc_value'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_disc_value" readonly/></td>';
  //<!-----------Disc Rate------------>
  html_code += '<td><input type="text" name="order_item_disc_rate[]" id="order_item_disc_rate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_disc_rate" readonly/></td>';
  //<!-----------Amount------------>
  html_code += '<td><input type="text" name="order_item_amount[]" id="order_item_amount'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_amount" value="0" readonly/></td>';
  //<!----------------------->
 
        //--------Delete Button----------------------------
 // html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';

html_code += '<td><i style="color:red;font-size: 35px;" name="remove_row" id="'+count+'" class="fa fa-trash-o fa-lg remove_row"></i></td>';


 //<i style="color:red;font-size: 40px;" id="dell" class="fa fa-trash-o fa-lg"></i>
       

  html_code += '</tr>';
  //-----------Append New Row --------------------------
  $('#invoice-item-table').append(html_code);
  $("#item_name"+count).focus();
        });
        
        $(document).on('click', '.remove_row', function(){
          
          var row_id = $(this).attr("id");
          
          var total_item_amount = $('#order_item_amount'+row_id).val();
          var final_amount = $('#final_total_amt').text();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
          $('#final_total_amt').text(result_amount);

          var order_bamount = $('#order_total_bamount').val();
          var order_bill_amount = parseFloat(order_bamount) - parseFloat(total_item_amount);
          $('#order_total_bamount').val(order_bill_amount);
//--------------- Total Quantity----------------------------------------
          var qty = $("#order_item_quantity"+row_id).val();
          if(qty <= 0){
          var oqty = $("#order_total_qty").val();
          var total_qty = parseFloat(oqty) - 0;
          $('#order_total_qty').val(total_qty);    
          }else{
          var oqty = $("#order_total_qty").val();
          var total_qty = parseFloat(oqty) - parseFloat(qty);
          $('#order_total_qty').val(total_qty);    
          }
//--------------- Total Gross Amount----------------------------------------
          var gmt = $("#order_item_gamount"+row_id).val();
          if(gmt <= 0){
          var ogmt = $("#order_total_tgamout").val();
          var total_gmt = parseFloat(ogmt) - 0;
          $('#order_total_tgamout').val(total_gmt);    
          }else{
          var ogmt = $("#order_total_tgamout").val();
          var total_gmt = parseFloat(ogmt) - parseFloat(gmt);
          $('#order_total_tgamout').val(total_gmt);    
          }
//--------------- Total Discount----------------------------------------
          var disc = $("#order_item_disc_value"+row_id).val();
          if(disc <= 0){
          var odisc = $("#order_total_tdisc").val();
          var total_disc = parseFloat(odisc) - 0;
          $('#order_total_tdisc').val(total_disc);    
          }else{
          var odisc = $("#order_total_tdisc").val();
          var total_disc = parseFloat(odisc) - parseFloat(disc);
          $('#order_total_tdisc').val(total_disc);    
          }       

/*       if(isNaN($('#final_total_amt').text())){
               $('#final_total_amt').text(0);
      }  */
          $('#row_id_'+row_id).remove();
          row_count--;
          $('#total_item').val(row_count);
          
          var row_idd = row_id - 1;
          $("#item_name"+row_idd).focus();

for(var i = row_count; i <=row_count; i++){
  ab.push(row_id);
 }  
          });
//---------------------Create Invoice Function------------------------------
        function cal_final_total(count)
        {
          var final_item_total = 0;
          var disc_value = 0;
          for(j=1; j<=row_count; j++)
          {
            var quantity = 0;
            var grate = 0;
            var gamount = 0;
            var item_total=0;
            
            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0)
            {
              drate = $('#order_item_disc_rate'+j).val();
              if(drate > 0){
                amount = parseFloat(quantity) * parseFloat(drate);
              }else{
                amount = $("#order_item_gamount"+j).val();
              }
              item_total = amount;
              final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
              }
              var disc = $("#order_item_disc_value"+j).val();
            if(disc > 0){
              disc_value = parseFloat(disc_value) + parseFloat(disc);
            }  

            }
            // final_item_total.toFixed(2);
          $('#order_total_tdisc').val(disc_value.toFixed(2));  
          $('#order_total_bamount').val(final_item_total.toFixed(2));
          $('#final_total_amt').text(final_item_total.toFixed(2));
         }
/* $(document).on('blur', '.order_item_grate', function(){
   cal_final_total(count);
}); */
$(document).on('keyup','.order_item_quantity , .order_item_disc_percent', function(){
 // $(".order_item_quantity").keypress(function(){
          cal_final_total(count);
        });
//---------------------Function for Total Qty--------------------------------------------------
 function cal_final_total_qty(count)
        {
          var final_total_qty = 0;
          var final_total_gmt = 0;
          for(j=1; j<=row_count; j++)
          {
            var quantity = 0;
            var qty = 0;
            var gamount = 0;
            var gmt = 0;
            
            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0){
              qty = $('#order_item_quantity'+j).val();
              }
            gamount = $('#order_item_gamount'+j).val();
            if(gamount >= 0){
              gmt = $('#order_item_gamount'+j).val();
            }              
              final_total_gmt = parseFloat(final_total_gmt) + parseFloat(gmt);
              final_total_qty = parseFloat(final_total_qty) + parseFloat(qty);
          }
            
            $('#order_total_tgamout').val(final_total_gmt);
            $('#order_total_qty').val(final_total_qty);
          }
$(document).on('keyup', '.order_item_quantity', function(){
          cal_final_total_qty(count);
        });

//---------------------------------------------------------------------------------------
  $(document).on('keypress',function(){
    $(function() {
  var dummy = [];
  for (var i = 0; i < 500; i++) {
    dummy.push(i);
    }
  $.each(dummy, function(i, v) { // New scope for i and v
     $('#item_name' + i).keyup(function() {
                  //alert(i);
      var itemcode = $(this).val();
        $.ajax({
          type: 'POST',
          url: 'Transaction_purchases/sqty_dynamics.php',
          data:{item_name:itemcode},
           success:function(data){
              $("#order_item_squantity"+ i).val(data);
            }
        });
      });
    });
  }); 
});
//---------------------------------------------------------------------------------------
$(document).on('keypress',function(){
  $(function() {
  var dummy = [];
  for (var i = 0; i < 500; i++) {
    dummy.push(i);
    }
  $.each(dummy, function(i, v) { // New scope for i and v
     $('#item_name' + i).keyup(function() {
      var itemcode = $(this).val();
        $.ajax({
          type: 'POST',
          url: 'Transaction_purchases/grate_dynamics.php',
          data:{item_name:itemcode},
           success:function(data){
              $("#order_item_grate"+ i).val(data);
            }
        });
      });
    });
  }); 
});
//--------------------------------------------------------------------------------------
$(document).on('keypress',function(){
  $(function() {
  var dummy = [];
  for (var i = 0; i < 500; i++) {
    dummy.push(i);
    }
  $.each(dummy, function(i, v) { // New scope for i and v
     $('#item_name' + i).keyup(function() {
                  //alert(i);
      var itemcode = $(this).val();
        $.ajax({
          type: 'POST',
          url: 'Transaction_purchases/prate_dynamics.php',
          data:{item_name:itemcode},
           success:function(data){
              $("#order_item_prate"+ i).val(data);
            }
        });
      });
    });
  }); 
});

//-------------Create Invoice------Authentication-------------------------
//-------------Code for Pressing Enter Key to Submit a Form---------------
$(document).on('keypress', '#create_invoice', function(e) {
  e.preventDefault();
  if(e.keyCode == 13){
//-------------------------------------------------------------
var myArr = $.merge(a,ab);
var newArr = myArr;
for(var h = 0; h < myArr.length; h++) {
    var curItem = myArr[h];
    var foundCount = 0;
    // search array for item
    for(var i = 0; i < myArr.length; i++) {
        if (myArr[i] == myArr[h])
            foundCount++;
    }
    if(foundCount > 1) {
        // remove repeated item from new array
        for(var j = 0; j < newArr.length; j++) {
            if(newArr[j] == curItem) {                
                newArr.splice(j, 1);
                j = j - 1;
} } } }
//-------------------------------------------------------------
  var allowSubmit = true;    // boolean variable
//-------------------------------------------------------------
if($.trim($('#order_receiver_name').val()).length == 0)
      {
      alert("Please Enter Reciever Name ");
      $('#order_receiver_name').focus();
      $('#order_receiver_name').css("border-color","#ff3300");
      allowSubmit = false;
      return false; 
      }
if($.trim($('#order_date').val()).length == 0)
      {
      alert("Please Select Invoice Date");
      $('#order_date').focus();
      $('#order_date').css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
//--------------------This code is only for 1st Row and only for Create invoice------------------
if($.trim($('#item_name1').val()).length == 0)
      {
      alert("Please Enter Item Name");
      $('#item_name1').focus();
      $('#item_name1').css("border-color","#ff3300");
      allowSubmit = false;    // set the variable to false
      return false;
      }
if($.trim($('#order_item_whname1').val()).length == 0)
      {
      alert("Please Enter Warehouse Name");
      $('#order_item_whname1').focus();
      $('#order_item_whname1').css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
if($.trim($('#order_item_quantity1').val()).length == 0)
      {
      alert("Please Enter Quantity");
      $('#order_item_quantity1').focus();
      $('#order_item_quantity1').css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
if($.trim($('#order_item_grate1').val()).length == 0)
      {
      alert("Please Enter Gross Rate");
      $('#order_item_grate1').focus();
      $('#order_item_grate1').css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
//-------------------------------------------------------------
$.each(newArr, function( i, l ){
  //alert( "Index #" + i + ": " + l );
if($.trim($('#item_name'+ l).val()).length == 0)
      {
      alert("Please Enter Item Name");
      $('#item_name'+ l).focus();
      $('#item_name'+ l).css("border-color","#ff3300");
      allowSubmit = false;    // set the variable to false
      return false;
      }
if($.trim($('#order_item_whname'+ l).val()).length == 0)
      {
      alert("Please Enter Warehouse Name");
      $('#order_item_whname'+ l).focus();
      $('#order_item_whname'+ l).css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
if($.trim($('#order_item_quantity'+ l).val()).length == 0)
      {
      alert("Please Enter Quantity");
      $('#order_item_quantity'+ l).focus();
      $('#order_item_quantity'+ l).css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
if($.trim($('#order_item_grate'+ l).val()).length == 0)
      {
      alert("Please Enter Gross Rate");
      $('#order_item_grate'+ l).focus();
      $('#order_item_grate'+ l).css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
//-----------------------------------------------------------
});
if (allowSubmit) {
    $('#invoice_form').submit();
  }
} // if (e.keyCode == 13)
  });

        
//-----------------Repeating code for Edit invoice on Click Event-------------------------------------
$(document).on('click', '#create_invoice', function(e) {
  e.preventDefault();
//-------------------------------------------------------------
var myArr = $.merge(a,ab);
var newArr = myArr;
for(var h = 0; h < myArr.length; h++) {
    var curItem = myArr[h];
    var foundCount = 0;
    // search array for item
    for(var i = 0; i < myArr.length; i++) {
        if (myArr[i] == myArr[h])
            foundCount++;
    }
    if(foundCount > 1) {
        // remove repeated item from new array
        for(var j = 0; j < newArr.length; j++) {
            if(newArr[j] == curItem) {                
                newArr.splice(j, 1);
                j = j - 1;
} } } }
//-------------------------------------------------------------
  var allowSubmit = true;    // boolean variable
//-------------------------------------------------------------
if($.trim($('#order_receiver_name').val()).length == 0)
      {
      alert("Please Enter Reciever Name ");
      $('#order_receiver_name').focus();
      $('#order_receiver_name').css("border-color","#ff3300");
      allowSubmit = false;
      return false; 
      }
if($.trim($('#order_date').val()).length == 0)
      {
      alert("Please Select Invoice Date");
      $('#order_date').focus();
      $('#order_date').css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
//-------------------------------------------------------------
//--------------------This code is only for 1st Row and only for Create invoice------------------
if($.trim($('#item_name1').val()).length == 0)
      {
      alert("Please Enter Item Name");
      $('#item_name1').focus();
      $('#item_name1').css("border-color","#ff3300");
      allowSubmit = false;    // set the variable to false
      return false;
      }
if($.trim($('#order_item_whname1').val()).length == 0)
      {
      alert("Please Enter Warehouse Name");
      $('#order_item_whname1').focus();
      $('#order_item_whname1').css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
if($.trim($('#order_item_quantity1').val()).length == 0)
      {
      alert("Please Enter Quantity");
      $('#order_item_quantity1').focus();
      $('#order_item_quantity1').css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
if($.trim($('#order_item_grate1').val()).length == 0)
      {
      alert("Please Enter Gross Rate");
      $('#order_item_grate1').focus();
      $('#order_item_grate1').css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
//-------------------------------------------------------------
$.each(newArr, function( i, l ){
  //alert( "Index #" + i + ": " + l );
if($.trim($('#item_name'+ l).val()).length == 0)
      {
      alert("Please Enter Item Name");
      $('#item_name'+ l).focus();
      $('#item_name'+ l).css("border-color","#ff3300");
      allowSubmit = false;    // set the variable to false
      return false;
      }
if($.trim($('#order_item_whname'+ l).val()).length == 0)
      {
      alert("Please Enter Warehouse Name");
      $('#order_item_whname'+ l).focus();
      $('#order_item_whname'+ l).css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
if($.trim($('#order_item_quantity'+ l).val()).length == 0)
      {
      alert("Please Enter Quantity");
      $('#order_item_quantity'+ l).focus();
      $('#order_item_quantity'+ l).css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
if($.trim($('#order_item_grate'+ l).val()).length == 0)
      {
      alert("Please Enter Gross Rate");
      $('#order_item_grate'+ l).focus();
      $('#order_item_grate'+ l).css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }      

//-----------------------------------------------------------
});
if (allowSubmit) {
    $('#invoice_form').submit();
  }

});




});

   </script>


      <?php
      }
 //----------------------Update code----------------------------
      
      elseif(isset($_GET["update"]) && isset($_GET["id"]))
      {
        $statement = $connect->prepare("
          SELECT * FROM tbl_order_purchase 
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
    $('#order_total_qty').val("<?php echo $row["order_total_qty"]; ?>");
    $('#order_total_tgamout').val("<?php echo $row["order_total_before_discount"]; ?>");
    $('#order_total_tdisc').val("<?php echo $row["order_total_discount_value"]; ?>");
    $('#order_total_bamount').val("<?php echo $row["order_total_after_discount"]; ?>");
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
                      <th width="23%">Item Name</th>
                      <th width="15%">Warehouse Name</th>
                      <th width="5%">Quantity</th>
                      <th width="5%">Stock Quantity</th>
                      <th width="5%">Previous Rate</th>
                      <th width="7%">Gross Rate</th>
                      <th width="8%">Gross Amount</th>

                      <th width="8%">Disc. %</th>
                      <th width="8%">Disc. Value</th>
                      <th width="8%">Disc. Rate</th>
                      <th width="8%">Amount</th>

                      <th width="3%">+/-</th>
                    </tr>
                    
                    <?php
                    $statement = $connect->prepare("
                      SELECT * FROM tbl_order_item_purchase 
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

  <!------------------------------------------------------------------------------->
  <!-----------Disc %------------>
  <td><input type="text" name="order_item_disc_percent[]" id="order_item_disc_percent<?php echo $m; ?>" data-srno="1" class="form-control input-sm number_only order_item_disc_percent" value="<?php echo $sub_row["order_item_disc_percent"];?>" /></td>
  <!-----------Disc Value------------>
  <td><input type="text" name="order_item_disc_value[]" id="order_item_disc_value<?php echo $m; ?>" data-srno="1" class="form-control input-sm number_only order_item_disc_value" value="<?php echo $sub_row["order_item_disc_value"];?>" readonly="" /></td>
  <!-----------Disc Rate------------>
  <td><input type="text" name="order_item_disc_rate[]" id="order_item_disc_rate<?php echo $m; ?>" data-srno="1" class="form-control input-sm number_only order_item_disc_rate" value="<?php echo $sub_row["order_item_disc_rate"];?>" readonly="" /></td>
  <!-----------Amount------------>
  <td><input type="text" name="order_item_amount[]" id="order_item_amount<?php echo $m; ?>" data-srno="1" class="form-control input-sm number_only order_item_amount" value="<?php echo $sub_row["order_item_amount"];?>" readonly="" /></td>
  <!----------------------->
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
<label><b>Total Qty:</label>
  <input type="text" name="order_total_qty" id="order_total_qty" data-srno="1" />
      </td>
      <td>
  <label><b>Total G.Amount:</label>
  <input type="text" name="order_total_tgamout" id="order_total_tgamout" data-srno="1" class="one"  />  </td>
  <td>
  <label><b>Total Discount:</label>
  <input type="text" name="order_total_tdisc" id="order_total_tdisc" data-srno="1" class="one"  />  </td>
  <td>
  <label><b>Bill Amount:</label>
  <input type="text" name="order_total_bamount" id="order_total_bamount" data-srno="1" class="one" />  </td>
  <!----------Hidden for total---------------------
  <td>
  <label><b>Hidden</label>
  <input type="text" name="order_gtotal" id="order_gtotal" data-srno="1" class="" />  </td>
--->

    <td><b>Total</b></td>
    <td><b><span id="final_total_amt"><?php echo $row["order_total_after_discount"]; ?></span></b>
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
var row_count = "<?php echo $m; ?>";
var a = [];
var ab = [];
        $(document).on('click', '#add_row', function(){
          row_count++; 
          count++;
for(var i = count; i <= count; i++){
a.push(count);
}

          $('#total_item').val(row_count);
          var html_code = '';
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';
  //----------Item Name-------------------        
  html_code += '<td><input type="text" name="item_name[]" id="item_name'+count+'" class="form-control input-sm abc" /></td>';
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
   //-----------------------------------------------------------------------

//<!-----------Disc %------------>
  html_code += '<td><input type="text" name="order_item_disc_percent[]" id="order_item_disc_percent'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_disc_percent" /></td>';
  //<!-----------Disc Value------------>
  html_code += '<td><input type="text" name="order_item_disc_value[]" id="order_item_disc_value'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_disc_value" value = "0" readonly/></td>';
  //<!-----------Disc Rate------------>
  html_code += '<td><input type="text" name="order_item_disc_rate[]" id="order_item_disc_rate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_disc_rate" readonly/></td>';
    //<!-----------Amount------------>
  html_code += '<td><input type="text" name="order_item_amount[]" id="order_item_amount'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_amount" readonly value = "0" /></td>';
  //----------Delete Button-------------------
  //html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';

html_code += '<td><i style="color:red;font-size: 40px;" name="remove_row" id="'+count+'" class="fa fa-trash-o fa-lg remove_row"></i></td>';




  html_code += '</tr>';
          $('#invoice-item-table').append(html_code);
          $("#item_name"+count).focus();
        });

//---------------------------------Remove Button ------------------------------------------
        $(document).on('click', '.remove_row', function(){
          var row_id = $(this).attr("id");

          //var total_item_qty = $('#order_item_quantity'+row_id).val();
          var final_qty = $('#order_total_qty').val();
        
           if(isNaN($('#order_total_qty').val())){
              $("#order_total_qty").val(final_qty);
           }

          var total_item_gmt = $('#order_item_gamount'+row_id).val();
          var final_gmt = $('#order_total_tgamout').val();
          var result_gmt = parseFloat(final_gmt) - parseFloat(total_item_gmt);

          var total_item_disc = $('#order_item_disc_value'+row_id).val();
          var final_disc = $('#order_total_tdisc').val();
          var result_disc = parseFloat(final_disc) - parseFloat(total_item_disc);

          var total_item_amount = $('#order_item_amount'+row_id).val();
          var final_amount = $('#order_total_bamount').val();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);

          //$('#order_total_qty').val(result_qty.toFixed(2));
          $('#order_total_tgamout').val(result_gmt.toFixed(2));
          $('#order_total_tdisc').val(result_disc.toFixed(2));
          $('#order_total_bamount').val(result_amount.toFixed(2));

          $('#row_id_'+row_id).remove();
          row_count--;
          $('#total_item').val(row_count);
          
          var row_idd = row_id - 1;
          $("#item_name"+row_idd).focus();

for(var i = row_count; i <=row_count; i++){
  ab.push(row_id);
 }

});

// This code is added by Naeem to Refresh the Final Total Amount while deleting any record
        $(document).on('click', '.deleted', function(){
          var row_id = $(this).attr("data-srno");
          
          var total_item_qty = $('#order_item_quantity'+row_id).val();
          var final_qty = $('#order_total_qty').val();
          var result_qty = parseFloat(final_qty) - parseFloat(total_item_qty);

          var total_item_gmt = $('#order_item_gamount'+row_id).val();
          var final_gmt = $('#order_total_tgamout').val();
          var result_gmt = parseFloat(final_gmt) - parseFloat(total_item_gmt);

          var total_item_disc = $('#order_item_disc_value'+row_id).val();
          var final_disc = $('#order_total_tdisc').val();
          var result_disc = parseFloat(final_disc) - parseFloat(total_item_disc);

          var total_item_amount = $('#order_item_amount'+row_id).val();
          var final_amount = $('#order_total_bamount').val();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);

          $('#order_total_qty').val(result_qty.toFixed(2));
          $('#order_total_tgamout').val(result_gmt.toFixed(2));
          $('#order_total_tdisc').val(result_disc.toFixed(2));
          $('#order_total_bamount').val(result_amount.toFixed(2));

          $('#row_id_'+row_id).remove();
          row_count--;
          $('#total_item').val(row_count);
          
          var row_idd = row_id - 1;
          $("#item_name"+row_idd).focus();
  
        });

//-------------------------Edit Invoice-----------------------------
function cal_final_total(count)
        {
          var final_item_total = 0;
          var disc_value = 0;
          var total_qty = 0;
          var total_gamount = 0;
          for(j=1; j<=row_count; j++)
      {
            var quantity = 0;
            var gamount = 0;
            var item_total=0;
            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0){
              total_qty = parseFloat(total_qty) + parseFloat(quantity);
            }
             var disc = $('#order_item_disc_value'+j).val();
            if(disc > 0){
              disc_value = parseFloat(disc_value) + parseFloat(disc);
            }
            var bill = $('#order_item_amount'+j).val();
            if(bill > 0){
              final_item_total = parseFloat(final_item_total) + parseFloat(bill);
            }  
              var total_gmt = $("#order_item_gamount"+j).val();
            if(total_gmt > 0){
               total_gamount = parseFloat(total_gamount) + parseFloat(total_gmt);
            } 
      }
          $('#order_total_qty').val(total_qty.toFixed(2));    
          $('#order_total_tgamout').val(total_gamount.toFixed(2));   
          $('#order_total_tdisc').val(disc_value.toFixed(2));  
          $('#order_total_bamount').val(final_item_total.toFixed(2));
          $('#final_total_amt').text(final_item_total.toFixed(2));
         }
$(document).on('keyup','.order_item_quantity , .order_item_disc_percent', function(){
          cal_final_total(count);
        });
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------
  $(document).on('keydown',function(){
    $(function() {
  var dummy = [];
  for (var i = 0; i < 500; i++) {
    dummy.push(i);
    }
  $.each(dummy, function(i, v) { // New scope for i and v
     $('#item_name' + i).keyup(function() {
                  //alert(i);
      var itemcode = $(this).val();
        $.ajax({
          type: 'POST',
          url: 'Transaction_purchases/sqty_dynamics.php',
          data:{item_name:itemcode},
           success:function(data){
              $("#order_item_squantity"+ i).val(data);
            }
        });
      });
    });
  }); 
});
//---------------------------------------------------------------------------------------
$(document).on('keydown',function(){
  $(function() {
  var dummy = [];
  for (var i = 0; i < 500; i++) {
    dummy.push(i);
    }
  $.each(dummy, function(i, v) { // New scope for i and v
     $('#item_name' + i).keyup(function() {
      var itemcode = $(this).val();
        $.ajax({
          type: 'POST',
          url: 'Transaction_purchases/grate_dynamics.php',
          data:{item_name:itemcode},
           success:function(data){
              $("#order_item_grate"+ i).val(data);
            }
        });
      });
    });
  }); 
});
//--------------------------------------------------------------------------------------
$(document).on('keydown',function(){
  $(function() {
  var dummy = [];
  for (var i = 0; i < 500; i++) {
    dummy.push(i);
    }
  $.each(dummy, function(i, v) { // New scope for i and v
     $('#item_name' + i).keyup(function() {
                  //alert(i);
      var itemcode = $(this).val();
        $.ajax({
          type: 'POST',
          url: 'Transaction_purchases/prate_dynamics.php',
          data:{item_name:itemcode},
           success:function(data){
              $("#order_item_prate"+ i).val(data);
            }
        });
      });
    });
  }); 
});

//----------Authentication code for Edit Invoice-----------------------------------------------------
$(document).on('keypress', '#create_invoice', function(e) {
  e.preventDefault();
  if(e.keyCode == 13){
//-------------------------------------------------------------
var myArr = $.merge(a,ab);
var newArr = myArr;
for(var h = 0; h < myArr.length; h++) {
    var curItem = myArr[h];
    var foundCount = 0;
    // search array for item
    for(var i = 0; i < myArr.length; i++) {
        if (myArr[i] == myArr[h])
            foundCount++;
    }
    if(foundCount > 1) {
        // remove repeated item from new array
        for(var j = 0; j < newArr.length; j++) {
            if(newArr[j] == curItem) {                
                newArr.splice(j, 1);
                j = j - 1;
} } } }
//-------------------------------------------------------------
  var allowSubmit = true;    // boolean variable
//-------------------------------------------------------------
if($.trim($('#order_receiver_name').val()).length == 0)
      {
      alert("Please Enter Reciever Name ");
      $('#order_receiver_name').focus();
      $('#order_receiver_name').css("border-color","#ff3300");
      allowSubmit = false;
      return false; 
      }
if($.trim($('#order_date').val()).length == 0)
      {
      alert("Please Select Invoice Date");
      $('#order_date').focus();
      $('#order_date').css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
//-------------------------------------------------------------
$.each(newArr, function( i, l ){
  //alert( "Index #" + i + ": " + l );
if($.trim($('#item_name'+ l).val()).length == 0)
      {
      alert("Please Enter Item Name");
      $('#item_name'+ l).focus();
      $('#item_name'+ l).css("border-color","#ff3300");
      allowSubmit = false;    // set the variable to false
      return false;
      }
if($.trim($('#order_item_whname'+ l).val()).length == 0)
      {
      alert("Please Enter Warehouse Name");
      $('#order_item_whname'+ l).focus();
      $('#order_item_whname'+ l).css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
if($.trim($('#order_item_quantity'+ l).val()).length == 0)
      {
      alert("Please Enter Quantity");
      $('#order_item_quantity'+ l).focus();
      $('#order_item_quantity'+ l).css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
if($.trim($('#order_item_grate'+ l).val()).length == 0)
      {
      alert("Please Enter Gross Rate");
      $('#order_item_grate'+ l).focus();
      $('#order_item_grate'+ l).css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }      

//-----------------------------------------------------------
});
if (allowSubmit) {
    $('#invoice_form').submit();
  }
} // if (e.keyCode == 13)
  });

        
//-----------------Repeating code for Edit invoice on Click Event-------------------------------------
$(document).on('click', '#create_invoice', function(e) {
  e.preventDefault();
//-------------------------------------------------------------
var myArr = $.merge(a,ab);
var newArr = myArr;
for(var h = 0; h < myArr.length; h++) {
    var curItem = myArr[h];
    var foundCount = 0;
    // search array for item
    for(var i = 0; i < myArr.length; i++) {
        if (myArr[i] == myArr[h])
            foundCount++;
    }
    if(foundCount > 1) {
        // remove repeated item from new array
        for(var j = 0; j < newArr.length; j++) {
            if(newArr[j] == curItem) {                
                newArr.splice(j, 1);
                j = j - 1;
} } } }
//-------------------------------------------------------------
  var allowSubmit = true;    // boolean variable
//-------------------------------------------------------------
if($.trim($('#order_receiver_name').val()).length == 0)
      {
      alert("Please Enter Reciever Name ");
      $('#order_receiver_name').focus();
      $('#order_receiver_name').css("border-color","#ff3300");
      allowSubmit = false;
      return false; 
      }
if($.trim($('#order_date').val()).length == 0)
      {
      alert("Please Select Invoice Date");
      $('#order_date').focus();
      $('#order_date').css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
//-------------------------------------------------------------
$.each(newArr, function( i, l ){
  //alert( "Index #" + i + ": " + l );
if($.trim($('#item_name'+ l).val()).length == 0)
      {
      alert("Please Enter Item Name");
      $('#item_name'+ l).focus();
      $('#item_name'+ l).css("border-color","#ff3300");
      allowSubmit = false;    // set the variable to false
      return false;
      }
if($.trim($('#order_item_whname'+ l).val()).length == 0)
      {
      alert("Please Enter Warehouse Name");
      $('#order_item_whname'+ l).focus();
      $('#order_item_whname'+ l).css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
if($.trim($('#order_item_quantity'+ l).val()).length == 0)
      {
      alert("Please Enter Quantity");
      $('#order_item_quantity'+ l).focus();
      $('#order_item_quantity'+ l).css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
if($.trim($('#order_item_grate'+ l).val()).length == 0)
      {
      alert("Please Enter Gross Rate");
      $('#order_item_grate'+ l).focus();
      $('#order_item_grate'+ l).css("border-color","#ff3300");
      allowSubmit = false;
      return false;
      }
//-----------------------------------------------------------
});
if (allowSubmit) {
    $('#invoice_form').submit();
  }

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
      <div style="border: solid; background: purple; color: white;"><h3 align="center"><B>Purchase Invoice:</B></h3></div>
      <br />
      <div align="right">
        <a href="purchases.php?add=1" class="btn btn-info btn-xs" id="new_create">Create</a>
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
                <td>'.$row["order_total_after_discount"].'</td>
                <td><a href="Transaction_purchases/print_purchases.php?pdf=1&id='.$row["order_id"].'">
                <i style="color:#7d42f4;font-size: 30px;" class="fa fa-print fa-lg"></i>    
                </a></td>
                <td><a href="purchases.php?update=1&id='.$row["order_id"].'">
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
        window.location.href="purchases.php?delete=1&id="+id;
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
      url:  "Transaction_purchases/delete.php",
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
      $("#order_total_qty").focus();  
    }
});
</script>       
<!------- This is a click event for autocomplete Customer_name--------->
<script >
  $(function() {
     $("#order_receiver_name").autocomplete({
        source: "Transaction_purchases/autocomplete_cusname.php",
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
        source: "Transaction_purchases/autocomplete_itemname.php",
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
        source: "Transaction_purchases/autocomplete_whname.php",
        minLength: 0,
        select: function (event, ui){}
          });                
        auto++;
      }while(auto<500);
    });
  }); 
</script>
<!----------------------------------------------------->
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
     $('#order_item_quantity' + i).keyup(function() {
      var qty = $("#order_item_quantity"+i).val();
      var grate = $("#order_item_grate"+i).val();
      var gamount = 0;
      gamount = parseFloat(qty) * parseFloat(grate);
      $("#order_item_gamount"+i).val(gamount);
      $("#order_item_amount"+i).val(gamount);

      if(isNaN($('#order_item_gamount'+i).val())){
        $("#order_item_gamount"+i).val(0);
      }
      if(isNaN($('#order_item_amount'+i).val())){
        $("#order_item_amount"+i).val(0);
      }      
      });
    });
  }); 
});
  
</script>
<!------------------------------------------------------------------------->
<script>
  
$(document).keydown(function(){
  $(function() {
//----- push numbers in dummy array----------
  var dummy = [];
  for (var i = 0; i < 500; i++) {
    dummy.push(i);
    }
 //----------------------------------------   
  $.each(dummy, function(i, v) { // New scope for i and v
  $("#order_item_disc_percent"+i).keyup(function(){
      var temp = $("#order_item_grate"+i).val();
      var percent = $("#order_item_disc_percent"+i).val();
      var percent_value = 0;
      percent_value = parseFloat(temp) *  parseFloat(percent) / 100;
  $('#order_item_disc_value'+i).val(percent_value);
//---------Discounted Rate---------------
    var grate = $("#order_item_grate"+i).val();
    var dvalue = $("#order_item_disc_value"+i).val();
    var did_rate = 0;
    var did_rate = parseFloat(grate)-parseFloat(dvalue);
  $("#order_item_disc_rate"+i).val(did_rate);
//---------Amount------------------------
    var quantity = $("#order_item_quantity"+i).val();
    var drate = $("#order_item_disc_rate"+i).val();
    var amount = 0;
    var amount = parseFloat(quantity) * parseFloat(drate);
  $("#order_item_amount"+i).val(amount);
//---------NaN Removing code-------------
      if(isNaN($('#order_item_disc_value'+i).val())){
        $("#order_item_disc_value"+i).val(0);
      }
      if(isNaN($('#order_item_disc_rate'+i).val())){
        $("#order_item_disc_rate"+i).val(0);
      }
      if(isNaN($('#order_item_amount'+i).val())){
        var gamount =$("#order_item_gamount"+i).val(); 
        $("#order_item_amount"+i).val(gamount);
      }
        });
      });
    });
  });

</script>
<?php include('footer.php'); ?>